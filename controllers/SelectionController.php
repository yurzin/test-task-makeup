<?php

namespace app\controllers;

use app\models\City;
use app\models\Specialization;
use Yii;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use app\viewModel\ViewModel;
use app\models\SelectionResume;

class SelectionController extends Controller
{
    public function actionSelectionResume()
    {
        $selectionModel = new SelectionResume();
        $dataProvider = $selectionModel->search(Yii::$app->request->get());


        $viewModel = new ViewModel($selectionModel);

        $viewModel->city = ArrayHelper::map(City::find()->asArray()->all(), 'id', 'name');
        $viewModel->specialization = ArrayHelper::map(Specialization::find()->asArray()->all(), 'id', 'name');

        return $this->render(
            'selection-resume',
            compact('dataProvider', 'viewModel')
        );
    }
}