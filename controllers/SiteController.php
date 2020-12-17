<?php

namespace app\controllers;

use Yii;
use app\models\Data;
use app\models\City;
use yii\data\Pagination;
use yii\helpers\ArrayHelper;
use yii\web\Controller;

class SiteController extends Controller
{

    public function actionIndex()
    {
        $get = Yii::$app->request->get();
        $array = count($get);

        /*foreach ($get as $item) {
            $item
        }*/
//      $city = ArrayHelper::getValue($get, 'city', '');
//      $gender = ArrayHelper::getValue($get, 'gender', '');

        if ( $get != NULL /*and $key != 'page'*/) {
            $data = Data::find()->where([]);
        } else {
            $data = Data::find();
        }

        $count = $data->count();

        $pagination = new Pagination([
            'defaultPageSize' => 4,
            'totalCount' => $count
        ]);

        $data = $data->offset($pagination->offset)->limit($pagination->limit)->all();
        return $this->render('index', compact('data', 'pagination', 'count', 'array'));
    }

    public function actionCity()
    {

        return $this->render('city', compact('city'));
    }

    public function actionMyresume()
    {
        return $this->render('myresume' );
    }

    public function actionViewresume()
    {
        $get = Yii::$app->request->get();
        $key = key($get);
        $value = $get[$key];
        $data = Data::findOne($value);
        return $this->render('viewresume', compact('data', 'get'));
    }
}