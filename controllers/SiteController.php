<?php

namespace app\controllers;

use phpDocumentor\Reflection\Types\Null_;
use Yii;
use app\models\Data;
use yii\data\Pagination;
use yii\web\Controller;

class SiteController extends Controller
{

    public function actionIndex()
    {
        $sort = Yii::$app->request->get('param');

        if ($sort != NULL) {
            $data = Data::find()->where(['gender' => $sort]);
        } else {
            $data = Data::find();
        }

        $count = $data->count();

        $pagination = new Pagination([
            'defaultPageSize' => 1,
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
