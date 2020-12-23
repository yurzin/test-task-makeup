<?php

namespace app\controllers;

use Yii;
use \yii\data\Sort;
use yii\data\Pagination;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\UploadedFile;
use app\models\City;
use app\models\Data;
use app\models\Filter;
use app\models\Resume;
use app\models\Specialization;

class SiteController extends Controller
{
    public function actionIndex()
    {
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

        $data = Data::find();
        $count = $data->count();

        $pagination = new Pagination([
            'defaultPageSize' => 4,
            'totalCount' => $count,
            'route' => 'resume-list'
        ]);

        $city = City::find()->select(['id', 'city'])->asArray()->all();
        $specialization = Specialization::find()->select(['id', 'specialization'])->asArray()->all();

        $city = array_values(array_unique(ArrayHelper::map($city, 'id', 'city')));
        $specialization = array_values(array_unique(ArrayHelper::map($specialization, 'id', 'specialization')));

        $data = $data->with('city')->with('specialization')->offset($pagination->offset)->limit($pagination->limit)->orderBy($sort->orders)->all();

        return $this->render('index', compact('data', 'pagination', 'count', 'all', 'sort', 'filter', 'city', 'specialization'));
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

        $data = Data::find()->orwhere(['like', 'last_name', $search])->orwhere(['like', 'last_work', $search]);

        $count = $data->count();

        $pagination = new Pagination([
            'defaultPageSize' => 4,
            'totalCount' => $count
        ]);

        $data = $data->offset($pagination->offset)->limit($pagination->limit)->orderBy($sort->orders)->all();
        return $this->render('search', compact('data', 'pagination', 'count', 'sort', 'city'));
    }

    public function actionViewresume($id)
    {
        $data = Data::findOne($id);
        return $this->render('viewresume', compact('data'));
    }

    public function actionFilter()
    {
        $get = Yii::$app->request->get();
        $filter = new Filter();

        if ($get['city'] !== '') {
            $id_city = ArrayHelper::getValue($get, 'city');
            $id_city = intval($id_city) + 1;
        }

        if ($get['specialization'] !== '') {
            $id_specialization = ArrayHelper::getValue($get, 'specialization');
            $id_specialization = intval($id_specialization + 1);
        }

        $salary = ArrayHelper::getValue($get, 'salary');
        $age_from = intval(ArrayHelper::getValue($get, 'age_from'));
        $age_to = ArrayHelper::getValue($get, 'age_to', 100);
        $gender = ArrayHelper::getValue($get, 'gender');

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
            ->andFilterWhere([
                'id_city' => $id_city,
                'gender' => $gender,
                'salary' => $salary,
                'id_specialization' => $id_specialization
            ])
            ->andFilterCompare('age', ">$age_from")
            ->andFilterCompare('age', "<$age_to");

        $count = $data->count();

        $pagination = new Pagination([
            'defaultPageSize' => 4,
            'totalCount' => $count,
            'route' => 'filter'
        ]);

        $data = $data->with('city')->with('specialization')->offset($pagination->offset)->limit($pagination->limit)->orderBy($sort->orders)->all();

        return $this->render('filter', compact('data', 'pagination', 'get', 'count', 'sort', 'city', 'salary', 'filter', 'specialization'));
    }

    public function actionResume()
    {
        $city = City::find()->select(['city'])->asArray()->all();
        $specialization = Specialization::find()->select(['specialization'])->asArray()->all();

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
        return $this->render('resume', compact('model', 'city', 'specialization', 'post'));
    }
}