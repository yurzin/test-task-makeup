<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\SelectionResume;
use app\viewmodels\Resume\ResumeViewModel;

class SelectionController extends Controller
{
    public function actionSelectionResume()
    {
        $selectionModel = new SelectionResume();
        $viewModel = new ResumeViewModel();
        $dataProvider = $selectionModel->search(Yii::$app->request->get());

        return $this->render(
            'selection-resume',
            [
                'dataProvider' => $dataProvider,
                'selectionModel' => $selectionModel,
                'viewModel' => $viewModel
            ]
        );
    }
}