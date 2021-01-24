<?php

namespace app\viewModel;

use DateTime;
use yii\helpers\ArrayHelper;

class ViewModel
{
    public $resume;
    public $city;
    public $specialization;

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

    public function getWorkExperience($organization)
    {
        return $organization->end_year -$organization->start_year;
    }
}