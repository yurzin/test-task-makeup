<?php

namespace app\viewModel\Resume;

use app\models\City;
use app\models\Resume;
use app\models\Specialization;
use DateTime;
use app\models\Schedule;
use app\models\Employments;

/**
 * This is the model class for table "resume".
 *
 * @property Resume $resume
 *
 */

class ResumeViewModel
{
    public $resume;

    public function __construct($resume)
    {
        $this->resume = $resume;
    }

    public function getEmploymentName()
    {
        foreach ($this->resume->busyness as $value) {
            if ($value > 0) {
                $employment[] = Employments::getLabel($value);
            }
        }
        return implode(', ', $employment);
    }

    public function getScheduleName()
    {
        foreach ($this->resume->timetable as $value) {
            if ($value > 0) {
                $schedule[] = Schedule::getLabel($value);
            }
        }
        return implode(', ', $schedule);
    }

    public function getAge()
    {
        $today = new DateTime();
        $interval = $today->diff(new DateTime($this->resume->birth_date));
        return $interval->y;
    }

    public function getExperience()
    {
        return $this->resume->organization->end_year - $this->resume->organization->start_year;
    }
}