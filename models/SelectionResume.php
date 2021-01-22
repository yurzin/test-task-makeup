<?php

namespace app\models;

use app\components\Serialize;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\helpers\VarDumper;

/**
 * This is the model class for table "resume".
 *
 * @property int|null $schedule
 * @property int|null $employment
 * @property int|null $ageFrom
 * @property int|null $ageTo
 */
class SelectionResume extends Resume
{
    public $ageFrom;
    public $ageTo;
    public $employment;
    public $schedule;


    public static function tableName()
    {
        return 'resume';
    }

    public function formName()
    {
        return '';
    }

    public function rules()
    {
        return [
            ['gender', 'string'],
            [['schedule', 'employment', 'experience'], 'safe'],
            [['city_id', 'specialization_id', 'salary', 'ageFrom', 'ageTo'], 'integer'],
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = self::getAll();

        $query->joinWith(['busyness', 'timetable'], true);

        $dataProvider = new ActiveDataProvider(
            [
                'query' => $query,
                'pagination' => [
                    'pageSize' => 4,
                ],
            ]
        );

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere(['city_id' => $this->city_id]);
        $query->andFilterWhere(['salary' => $this->salary]);
        $query->andFilterWhere(['gender' => $this->gender]);
        $query->andFilterWhere(['specialization_id' => $this->specialization_id]);
        $query->andFilterWhere(['like', 'experience', is_array($this->experience) ? implode(",", $this->experience) : $this->experience]);

        if (is_array($this->schedule)) {

            $schedule = implode(" ", $this->schedule);

            $query->andFilterWhere(['timetable.full_day' => $schedule]);
            $query->orFilterWhere(['timetable.shift_work' => $schedule]);
            $query->orFilterWhere(['timetable.flexible_work' => $schedule]);
            $query->orFilterWhere(['timetable.remote_work' => $schedule]);
            $query->orFilterWhere(['timetable.shift_method' => $schedule]);

        }

        if (is_array($this->employment)) {

            $employment = implode(" ", $this->employment);

            $query->andFilterWhere(['busyness.full_employment' => $employment]);
            $query->orFilterWhere(['busyness.part_time_employment' => $employment]);
            $query->orFilterWhere(['busyness.project_work' => $employment]);
            $query->orFilterWhere(['busyness.internship' => $employment]);
            $query->orFilterWhere(['busyness.volunteering' => $employment]);
        }

        $query->andFilterWhere(['>=', 'TIMESTAMPDIFF(YEAR, birth_date, curdate())', $this->ageFrom]);
        $query->andFilterWhere(['<=', 'TIMESTAMPDIFF(YEAR, birth_date, curdate())', $this->ageTo]);

        return $dataProvider;
    }
}