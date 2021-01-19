<?php

namespace app\viewModel;

use DateTime;

class ViewModel
{
    public $resume;

    public function __construct($resume)
    {
        $this->resume = $resume;
    }

    public function getAge($birthDate)
    {
        $today = new DateTime();
        $interval = $today->diff(new DateTime($birthDate));
        return $interval->y;
    }
}