<?php

namespace app\viewModel;

use DateTime;

class ViewModel
{
    private $resume;

    public function __construct($resume)
    {
        $this->resume = $resume;
    }

    public function getAge()
    {
        $today = new DateTime();
        $interval = $today->diff(new DateTime($this->resume->birth_date));
        return $interval->y;
    }
}