<?php

namespace app\controllers;

use Yii;
use app\models\Data;
use app\models\City;
use yii\data\Pagination;
use yii\web\Controller;

class SiteController extends Controller
{

    public function actionIndex()
    {
        $get = Yii::$app->request->get();
        $k = key($get);
        $j = $get[$k];
        //$sort = Yii::$app->request->get('gender');

        if ($get != NULL) {
            $data = Data::find()->where([$k => $j]);
        } else {
            $data = Data::find();
        }

        $count = $data->count();

        $pagination = new Pagination([
            'defaultPageSize' => 4,
            'totalCount' => $count
        ]);

        $data = $data->offset($pagination->offset)->limit($pagination->limit)->all();
        return $this->render('index', compact('data', 'pagination', 'get'));
    }

    public function actionCity()
    {
        $city_sort = Yii::$app->request->get('city');

        $city = City::find()->with('data')->where('id=1')->all();

        return $this->render('city', compact('city'));
    }

    public function actionMyresume()
    {
        return $this->render('myresume' );
    }
}