<?php

namespace app\viewModel;

use app\models\Employments;
use DateTime;
use yii\helpers\ArrayHelper;

class ViewModel
{
    public $resume;

    public function __construct($resume)
    {
        $this->resume = ArrayHelper::index($resume, 'id');
    }

    public function getAge($birthDate)
    {
        $today = new DateTime();
        $interval = $today->diff(new DateTime($birthDate));
        return $interval->y;
    }

    public function getExperience($id)
    {
        return $this->resume[$id]->organization->end_year - $this->resume[$id]->organization->start_year;
    }
}