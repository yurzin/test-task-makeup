<?php

namespace app\viewmodels\Resume;

use app\models\Employment;
use app\models\Schedule;
use DateTime;

class ResumeViewModel
{
    public function getEmploymentsName($employment)
    {
        foreach (explode(',', $employment) as $value) {
            $employments[] = Employment::getLabel($value);
        }
        return implode(', ', $employments);
    }

    public function getSchedulesName($schedule)
    {
        foreach (explode(',', $schedule) as $value) {
            $schedules[] = Schedule::getLabel($value);
        }
        return implode(', ', $schedules);
    }

    public function getAge($birthDate)
    {
        $today = new DateTime();
        $birthDate = new DateTime($birthDate);
        $interval = $today->diff($birthDate);
        return  $interval->y;
    }
}