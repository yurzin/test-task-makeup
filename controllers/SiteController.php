<?php

namespace app\controllers;

use Yii;
use app\models\Organization;
use \yii\data\Sort;
use yii\data\Pagination;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\UploadedFile;
use app\models\City;
use app\models\Resume;
use app\models\AddResume;
use app\models\Specialization;
use app\viewmodels\Resume\ResumeViewModel;

class SiteController extends Controller
{
    public function actionIndex()
    {
        $sort = new Sort(
            [
                'defaultOrder' => [
                    'date' => SORT_DESC
                ],
                'attributes' => [
                    'date',
                    'salary'
                ],
                'sortParam' => 'type',
                'route' => 'sort'
            ]
        );

        $resume = Resume::getAll();
        $count = $resume->count();
        $pagination = new Pagination(
            [
                'defaultPageSize' => 4,
                'totalCount' => $count,
                'route' => 'resume-list'
            ]
        );

        $city = ArrayHelper::map(City::find()->asArray()->all(), 'id', 'city');

        $specialization = ArrayHelper::map(Specialization::find()->asArray()->all(), 'id', 'specialization');

        $resume = $resume->offset($pagination->offset)->limit($pagination->limit)->orderBy($sort->orders)->all();

        return $this->render(
            'index',
            compact('resume', 'pagination', 'count', 'sort', 'city', 'specialization')
        );
    }

    public function actionMyResume()
    {
        return $this->render('my-resume');
    }

    public function actionSearch()
    {
        $search = Yii::$app->request->get('query');

        $sort = new Sort(
            [
                'defaultOrder' => [
                    'date' => SORT_DESC
                ],
                'attributes' => [
                    'date',
                    'salary'
                ],
                'sortParam' => 'type',
                'route' => 'sort'
            ]
        );

        $resume = Resume::getAll()
            ->joinWith(['specialization', 'specialization'], true)
            ->joinWith(['organization', 'organization'], true)
            ->joinWith(['city', 'city'], true)
            ->andWhere(['like', 'last_name', $search])
            ->andWhere(['like', 'organization', $search])
            ->andWhere(['like', 'city', $search])
            ->andWhere(['like', 'specialization', $search]);


        $count = $resume->count();

        $pagination = new Pagination(
            [
                'defaultPageSize' => 4,
                'totalCount' => $count
            ]
        );

        $resume = $resume->offset($pagination->offset)->limit($pagination->limit)->orderBy($sort->orders)->all();
        return $this->render('search', compact('resume', 'pagination', 'count', 'sort', 'city'));
    }

    public function actionViewResume($id)
    {
        $resume = Resume::getOne($id);
//        $viewModel = new ResumeViewModel();
//        $viewModel->employment = $resume['employment'];
//        $viewModel->schedule = $resume['schedule'];

        return $this->render('view-resume', compact('resume'));
    }

    public function actionResume()
    {
        $modelAddResume = new AddResume();
        $modelOrganization = new Organization();

        $city = ArrayHelper::map(City::find()->asArray()->all(), 'id', 'city');
        $specialization = ArrayHelper::map(Specialization::find()->asArray()->all(), 'id', 'specialization');

        if ($modelAddResume->load(Yii::$app->request->post())) {
            $modelAddResume->schedule = implode(",", $modelAddResume->schedule);
            $modelAddResume->employment = implode(",", $modelAddResume->employment);

            $modelAddResume->imageFile = UploadedFile::getInstance($modelAddResume, 'imageFile');
            $path = '../../images/' . $modelAddResume->imageFile->baseName . '.' . $modelAddResume->imageFile->extension;
            $modelAddResume->photo = $path;

            if ($modelAddResume->save() && $modelAddResume->upload()) {
                $modelOrganization->resume_id = $modelAddResume->id;
                $modelOrganization->start_month = $modelAddResume->start_month;
                $modelOrganization->start_year = $modelAddResume->start_year;
                $modelOrganization->end_month = $modelAddResume->end_month;
                $modelOrganization->end_year = $modelAddResume->end_year;
                $modelOrganization->organization = $modelAddResume->organization;
                $modelOrganization->position = $modelAddResume->position;
                $modelOrganization->duties = $modelAddResume->duties;
                $modelOrganization->save();
                Yii::$app->session->setFlash(
                    'success',
                    true
                );
                return $this->redirect('my-resume');
            } else {
                Yii::$app->session->setFlash(
                    'success',
                    false
                );
            }
        }
        return $this->render(
            'resume',
            [
                'model' => $modelAddResume,
                'city' => $city,
                'specialization' => $specialization,
                'path' => $path
            ]
        );
    }
}