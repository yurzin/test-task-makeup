<?php

namespace app\controllers;

use app\models\Employment;
use app\viewmodel\Resume\ResumeViewModel;
use app\viewModel\ViewModel;
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

class SiteController extends Controller
{
    public function actionIndex()
    {
        $resume = new Resume();

        $viewModel = new ViewModel($resume);

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

        $count = $resume->find()->count();
        $pagination = new Pagination(
            [
                'defaultPageSize' => 4,
                'totalCount' => $count,
                'route' => 'resume-list'
            ]
        );

        $city = ArrayHelper::map(City::find()->asArray()->all(), 'id', 'name');

        $specialization = ArrayHelper::map(Specialization::find()->asArray()->all(), 'id', 'specialization');

        $resume = $resume->find()->offset($pagination->offset)->limit($pagination->limit)->orderBy($sort->orders)->all();

        return $this->render(
            'index',
            compact('resume', 'pagination', 'count', 'sort', 'city', 'specialization', 'viewModel')
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

        $resume = new Resume();

        $resume->find()
            ->joinWith(['specialization', 'specialization'], true)
            ->joinWith(['organization', 'organization'], true)
            ->joinWith(['city', 'city'], true)
            ->andWhere(['like', 'last_name', $search])
            ->andWhere(['like', 'organization', $search])
            ->andWhere(['like', 'city', $search])
            ->andWhere(['like', 'specialization', $search]);

        $count = $resume->find()->count();

        $pagination = new Pagination(
            [
                'defaultPageSize' => 4,
                'totalCount' => $count
            ]
        );

        $resume = $resume->find()->offset($pagination->offset)->limit($pagination->limit)->orderBy($sort->orders)->all();
        return $this->render('search', compact('resume', 'pagination', 'count', 'sort', 'city'));
    }

    public function actionViewResume($id)
    {
        $resume = Resume::getOne($id);
        $viewModel = new ResumeViewModel($resume);
        return $this->render('view-resume', compact('resume', 'viewModel'));
    }

    public function actionResume()
    {
        $modelAddResume = new AddResume();
        $modelOrganization = new Organization();
        $modelEmployment = new Employment();

        $city = ArrayHelper::map(City::find()->asArray()->all(), 'id', 'name');
        $specialization = ArrayHelper::map(Specialization::find()->asArray()->all(), 'id', 'specialization');

        if ($modelAddResume->load(Yii::$app->request->post())) {
            $modelAddResume->setScheduleSerialize($modelAddResume->schedule);
            $modelAddResume->imageFile = UploadedFile::getInstance($modelAddResume, 'imageFile');
            $path = '../../images/' . $modelAddResume->imageFile->baseName . '.' . $modelAddResume->imageFile->extension;
            $modelAddResume->photo = $path;

            if ($modelAddResume->save() && $modelAddResume->upload()) {
                $modelEmployment->resume_id = $modelAddResume->id;
                $modelEmployment->full_employment = $modelAddResume->setEmploymentSerialize(
                    $modelAddResume->employment
                );
                $modelOrganization->resume_id = $modelAddResume->id;
                $modelOrganization->start_month = $modelAddResume->start_month;
                $modelOrganization->start_year = $modelAddResume->start_year;
                $modelOrganization->end_month = $modelAddResume->end_month;
                $modelOrganization->end_year = $modelAddResume->end_year;
                $modelOrganization->organization = $modelAddResume->organization;
                $modelOrganization->position = $modelAddResume->position;
                $modelOrganization->duties = $modelAddResume->duties;
                $modelEmployment->save();
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