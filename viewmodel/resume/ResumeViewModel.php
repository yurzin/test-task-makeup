<?php

namespace app\viewModel\Resume;

use DateTime;
use app\models\Schedule;
use app\models\Employments;

class ResumeViewModel
{
    public $resume;

    public function __construct($resume)
    {
        $this->resume = $resume;
    }

    public function getEmploymentName()
    {
        foreach (explode(',', $this->resume->employment) as $value) {
            $employment[] = Employments::getLabel($value);
        }
        return implode(', ', $employment);
    }

    public function getScheduleName()
    {
        foreach (explode(',', $this->resume->schedule) as $value) {
            $schedule[] = Schedule::getLabel($value);
        }
        return implode(', ', $schedule);
    }

    public function getAge()
    {
        $today = new DateTime();
        $interval = $today->diff(new DateTime($this->resume->birth_date));
        return $interval->y;
    }
}