<?php

namespace app\controllers;

use Yii;
use app\models\Data;
use yii\data\Pagination;
use yii\web\Controller;
use app\models\City;

class SiteController extends Controller
{

    public function actionIndex()
    {
        //$sort = Yii::$app->request->get('gender');
        //$city = City::findAll($sort);
        $city = Yii::$app->request->get('city');
        $sort = City::findAll('city');

        if ($sort != NULL) {
            $data = Data::find()->where(['city_id' => $sort]);
        } else {
            $data = Data::find();
        }

        $count = $data->count();

        $pagination = new Pagination([
            'defaultPageSize' => 4,
            'totalCount' => $count
        ]);

        $data = $data->offset($pagination->offset)->limit($pagination->limit)->all();
        return $this->render('index', compact('data', 'pagination'));
    }

    public function actionMyresume()
    {
        return $this->render('myresume');
    }
}