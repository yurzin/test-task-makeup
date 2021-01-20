<?php

namespace app\controllers;

use Yii;
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

        return $this->render(
            'selection-resume',
            compact('dataProvider', 'viewModel')
        );
    }
}