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

/* @var $attribute */

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

        $resume = $resume->offset($pagination->offset)->limit($pagination->limit)->orderBy($sort->orders)->all();

        $viewModel = new ViewModel($resume);

        $viewModel->city = ArrayHelper::map(City::find()->asArray()->all(), 'id', 'name');
        $viewModel->specialization = ArrayHelper::map(Specialization::find()->asArray()->all(), 'id', 'name');

        return $this->render(
            'index',
            compact('pagination', 'count', 'sort', 'viewModel')
        );
    }

    public function actionMyResume()
    {
        return $this->render('my-resume');
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
                foreach ($modelAddResume->employment as $key => $value) {
                    $key = mb_strtolower($key);
                    $modelBusyness->$key = $value;
                }

                $modelTimetable->link('resume', $modelAddResume, 'id');

                foreach ($modelAddResume->schedule as $key => $value) {
                    $key = mb_strtolower($key);
                    $modelTimetable->$key = $value;
                }

                $modelTimetable->save();
                $modelBusyness->save();

                if ($modelAddResume->experience > 1) {
                    $modelOrganization->link('resume', $modelAddResume, 'id');

                    var_dump($modelAddResume->getExperienceAttribute());
die();
                   $attribute = [
                        'start_month' => $modelAddResume->start_month,
                        'start_year' => $modelAddResume->start_year,
                        'end_month' => $modelAddResume->end_month,
                        'end_year' => $modelAddResume->end_year,
                        'name' => $modelAddResume->organization,
                        'position' => $modelAddResume->position,
                        'duties' => $modelAddResume->duties
                    ];

                    $modelOrganization->attributes = $attribute;

                    $modelOrganization->save();

                }

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