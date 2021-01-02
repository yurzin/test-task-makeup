<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\SelectionResume;

class SelectionController extends Controller
{
    public function actionSelectionResume()
    {
        $selectionModel = new SelectionResume();
        $dataProvider = $selectionModel->search(Yii::$app->request->get());

        return $this->render(
            'selection-resume',
            [
                'dataProvider' => $dataProvider,
                'selectionModel' => $selectionModel
            ]
        );
    }
}