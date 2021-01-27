<?php

namespace app\controllers;

use app\models\City;
use app\models\Specialization;
use Yii;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use app\models\SearchModel;
use app\viewModel\ViewModel;

class SearchController extends Controller
{
    public function actionSearchResume()
    {
        $searchModel = new SearchModel();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $viewModel = new ViewModel($searchModel);

        $viewModel->city = ArrayHelper::map(City::find()->asArray()->all(), 'id', 'name');
        $viewModel->specialization = ArrayHelper::map(Specialization::find()->asArray()->all(), 'id', 'name');

        return $this->render(
            'search-resume',
            compact('dataProvider', 'viewModel')
        );
    }
}