<?php

namespace app\controllers;

use Yii;
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

        return $this->render(
            'search-resume',
            compact('dataProvider', 'viewModel')
        );
    }
}