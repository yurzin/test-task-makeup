<?php

namespace app\controllers;

use Yii;
use app\models\Busyness;
use app\models\Timetable;
use app\viewmodel\Resume\ResumeViewModel;
use app\viewModel\ViewModel;
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
        $resume = Resume::getAll();
        $count = $resume->count();

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

        $pagination = new Pagination(
            [
                'defaultPageSize' => 4,
                'totalCount' => $count,
                'route' => 'resume-list'
            ]
        );

        $city = ArrayHelper::map(City::find()->asArray()->all(), 'id', 'name');

        $specialization = ArrayHelper::map(Specialization::find()->asArray()->all(), 'id', 'name');
        $resume = $resume->offset($pagination->offset)->limit($pagination->limit)->orderBy($sort->orders)->all();
        $viewModel = new ViewModel($resume);

        return $this->render(
            'index',
            compact('pagination', 'count', 'sort', 'city', 'specialization', 'viewModel')
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
        $viewModel = new ResumeViewModel(Resume::getOne($id));
        return $this->render('view-resume', compact('viewModel'));
    }

    public function actionResume()
    {
        $modelAddResume = new AddResume();
        $modelOrganization = new Organization();
        $modelBusyness = new Busyness();
        $modelTimetable = new Timetable();

        $city = ArrayHelper::map(City::find()->asArray()->all(), 'id', 'name');
        $specialization = ArrayHelper::map(Specialization::find()->asArray()->all(), 'id', 'name');

        if ($modelAddResume->load(Yii::$app->request->post())) {

            $modelAddResume->imageFile = UploadedFile::getInstance($modelAddResume, 'imageFile');
            $path = '../../images/' . $modelAddResume->imageFile->baseName . '.' . $modelAddResume->imageFile->extension;
            $modelAddResume->photo = $path;

            if ($modelAddResume->save() && $modelAddResume->upload()) {

                $modelBusyness->link('resume', $modelAddResume, 'id');

                $modelBusyness->full_employment = $modelAddResume->employment[0];
                $modelBusyness->part_time_employment = $modelAddResume->employment[1];
                $modelBusyness->project_work = $modelAddResume->employment[2];
                $modelBusyness->internship = $modelAddResume->employment[3];
                $modelBusyness->volunteering = $modelAddResume->employment[4];

                $modelTimetable->link('resume', $modelAddResume, 'id');

                $modelTimetable->full_day = $modelAddResume->schedule[0];
                $modelTimetable->shift_work = $modelAddResume->schedule[1];
                $modelTimetable->flexible_work = $modelAddResume->schedule[2];
                $modelTimetable->remote_work = $modelAddResume->schedule[3];
                $modelTimetable->shift_method = $modelAddResume->schedule[4];

                $modelOrganization->resume_id = $modelAddResume->id;
                $modelOrganization->start_month = $modelAddResume->start_month;
                $modelOrganization->start_year = $modelAddResume->start_year;
                $modelOrganization->end_month = $modelAddResume->end_month;
                $modelOrganization->end_year = $modelAddResume->end_year;
                $modelOrganization->name = $modelAddResume->organization;
                $modelOrganization->position = $modelAddResume->position;
                $modelOrganization->duties = $modelAddResume->duties;

                $modelTimetable->save();
                $modelBusyness->save();
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