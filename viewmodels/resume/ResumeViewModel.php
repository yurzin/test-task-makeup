<?php

namespace app\viewmodels\Resume;

use app\models\Employment;
use app\models\Schedule;
use DateTime;

class ResumeViewModel
{
    public function getEmploymentsName()
    {
        foreach (explode(',', $this->employment) as $value) {
            $employment[] = Employment::getLabel($value);
        }
        echo implode(', ', $employment);
    }

    public function getSchedulesName()
    {
        foreach (explode(',', $this->schedule) as $value) {
            $schedule[] = Schedule::getLabel($value);
        }
        echo implode(', ', $schedule);
    }

    public function getAge($birthDate)
    {
        $today = new DateTime();
        $birthDate = new DateTime($birthDate);
        $interval = $today->diff($birthDate);
        return  $interval->y;
    }
}