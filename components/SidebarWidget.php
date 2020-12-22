<?php

namespace app\components;

use Yii;
use app\models\Filter;
use yii\base\Widget;

class SidebarWidget extends Widget
{
    public $city;
    public $specialization;

   /* public function init()
    {
        parent::init();
        if ($this->city === null) {
            $this->city = ['Кемерово' => 'Кемерово', 'Новосибирск' => 'Новосибирск', 'Иркутск' => 'Иркутск', 'Красноярск' => 'Красноярск', 'Барнаул' => 'Барнаул'];
        }
        if ($this->specialization === null) {
            $this->specialization = ['Администратор баз данных', 'Аналитик', 'Арт-директор', 'Инженер', 'Компьютерная безопасность'];
        }
    }*/

    public function run() {
        $model = new Filter();
        $model->load(Yii::$app->request->get());
        return $this->render('sidebar-widget', ['model' => $model, 'city' => $this->city, 'specialization' => $this->specialization]);
    }
}