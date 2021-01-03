<?php

namespace app\controllers;

use Yii;
use \yii\data\Sort;
use yii\data\Pagination;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\UploadedFile;
use app\models\Resume;
use app\models\FormFilter;
use app\models\AddResume;

class SiteController extends Controller
{
    public function actionIndex()
    {
        $filter = new FormFilter();

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

        $resume = Resume::find();
        $count = $resume->count();

        $pagination = new Pagination(
            [
                'defaultPageSize' => 4,
                'totalCount' => $count,
                'route' => 'resume-list'
            ]
        );

        $city = ArrayHelper::map(Resume::find()->select(['city'])->asArray()->all(), 'city', 'city');
        $specialization = ArrayHelper::map(
            Resume::find()->select(['specialization'])->asArray()->all(),
            'specialization',
            'specialization'
        );

        /*$filter = $filter->with('city')->with('specialization')->offset($pagination->offset)->limit(
            $pagination->limit
        )->orderBy($sort->orders)->all();*/

        $resume = $resume->offset($pagination->offset)->limit($pagination->limit)->orderBy($sort->orders)->all();

        return $this->render(
            'index',
            compact('resume', 'pagination', 'count', 'sort', 'filter', 'city', 'specialization')
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

        $resume = Resume::find()->orwhere(['like', 'last_name', $search])->orwhere(['like', 'last_work', $search]);

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
        $resume = Resume::findOne($id);
        return $this->render('view-resume', compact('resume'));
    }

    public function actionResume()
    {
        $city = ArrayHelper::map(Resume::find()->select(['city'])->asArray()->all(), 'city', 'city');
        $specialization = ArrayHelper::map(
            Resume::find()->select(['specialization'])->asArray()->all(),
            'specialization',
            'specialization'
        );

        $model = new AddResume();

        if ($model->load(Yii::$app->request->post())) {
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            $path = '../../images/' . $model->imageFile->baseName . '.' . $model->imageFile->extension;
            $model->photo = $path;
            if ($model->save() && $model->upload()) {
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
        return $this->render('resume', compact('model', 'city', 'specialization', 'path'));
    }
}