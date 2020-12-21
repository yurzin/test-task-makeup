<?php

namespace app\controllers;

use Yii;
use \yii\data\Sort;
use yii\data\Pagination;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\UploadedFile;
use app\models\Data;
use app\models\Filter;
use app\models\Resume;

class SiteController extends Controller
{
    public function actionIndex()
    {
        $get = Yii::$app->request->get();
        $filter = new Filter();

        $sort = new Sort([
            'defaultOrder' => [
                'date' => SORT_DESC
            ],
            'attributes' => [
                'date',
                'salary'
            ],
            'sortParam' => 'type',
            'route' => 'sort'
        ]);

        if ($get != NULL) {

            $age_from = intval(ArrayHelper::getValue($get, 'age_from'));
            $age_to = intval(ArrayHelper::getValue($get, 'age_to', 100));
            $city = ArrayHelper::getValue($get, 'city');
            $salary = intval(ArrayHelper::getValue($get, 'salary'));
            $data = Data::find()
                ->andFilterWhere([
                    'city' => $city,
                    'gender' => $get['gender'],
                    'salary' => $salary,
                    'specialization' => $get['specialization']
                ])
                ->andFilterCompare('age', ">$age_from")
                ->andFilterCompare('age', "<$age_to");
        } else {
            $data = Data::find();
        }

        $count = $data->count();

        $pagination = new Pagination([
            'defaultPageSize' => 4,
            'totalCount' => $count,
            'route' => 'resume-list'
        ]);

        $city = Data::find()->select(['id', 'city'])->asArray()->all();
        $city = array_values(array_unique(ArrayHelper::map($city, 'id', 'city')));
        $data = $data->offset($pagination->offset)->limit($pagination->limit)->orderBy($sort->orders)->all();

        return $this->render('index', compact('data', 'pagination', 'count', 'sort', 'city', 'salary', 'filter'));
    }

    public function actionMyresume()
    {
        return $this->render('myresume');
    }

    public function actionSearch()
    {
        $search = Yii::$app->request->get('query');

        $sort = new Sort([
            'defaultOrder' => [
                'date' => SORT_DESC
            ],
            'attributes' => [
                'date',
                'salary'
            ],
            'sortParam' => 'type',
            'route' => 'sort'
        ]);

        $data = Data::find()
            ->orwhere(['like', 'last_name', $search])
            ->orwhere(['like', 'city', $search])
            ->orwhere(['like', 'last_work', $search])
            ->orwhere(['like', 'specialization', $search]);

        $count = $data->count();

        $pagination = new Pagination([
            'defaultPageSize' => 4,
            'totalCount' => $count
        ]);

        $data = $data->offset($pagination->offset)->limit($pagination->limit)->orderBy($sort->orders)->all();
        return $this->render('index', compact('data', 'pagination', 'count', 'sort', 'city'));
    }

    public function actionViewresume($id)
    {
        $data = Data::findOne($id);
        return $this->render('viewresume', compact('data'));
    }

    public function actionFilter()
    {
        $city = Data::find()->select('city')->distinct()->asArray()->all();
        return $this->render('filter', compact('city'));
    }


    public function actionResume()
    {
        $model = new Resume();
        if ($model->load(Yii::$app->request->post())) {
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            $model->photo = '../../images/' . $model->imageFile->baseName . '.' . $model->imageFile->extension;
            if ($model->save() && $model->upload()) {
                Yii::$app->session->setFlash(
                    'success',
                    true
                );
                return $this->refresh();
            } else {
                Yii::$app->session->setFlash(
                    'success',
                    false
                );
            }
        }
        return $this->render('resume', compact('model'));
    }
}