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

        if ( $get != NULL and $get['page'] === NULL) {
            $data = Data::find()->andFilterWhere([
                'city' => $get['city'] ,
                'gender' => $get['gender']
            ]);
        } else {
            $data = Data::find();
        }

        $count = $data->count();

        $pagination = new Pagination([
            'defaultPageSize' => 4,
            'totalCount' => $count
        ]);

        $data = $data->offset($pagination->offset)->limit($pagination->limit)->all();
        return $this->render('index', compact('data', 'pagination', 'count'));
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