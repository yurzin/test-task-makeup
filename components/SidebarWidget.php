<?php

namespace app\components;

use app\models\FormFilter;
use yii\base\Widget;

class SidebarWidget extends Widget
{
    public $city;
    public $gender;
    public $specialization;

    public function run()
    {
        $model = new FormFilter();
        return $this->render(
            'sidebar-widget',
            ['model' => $model, 'city' => $this->city, 'specialization' => $this->specialization, 'gender' => $this->gender]
        );
    }
}