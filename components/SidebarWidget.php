<?php

namespace app\components;

use Yii;
use app\models\FormFilter;
use yii\base\Widget;

class SidebarWidget extends Widget
{
    public $city;
    public $specialization;

    public function run()
    {
        $model = new FormFilter();
        //$model->load(Yii::$app->request->get());
        return $this->render(
            'sidebar-widget',
            ['model' => $model, 'city' => $this->city, 'specialization' => $this->specialization]
        );
    }
}