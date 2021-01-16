<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

class SelectionResume extends Resume
{
    public $ageFrom;
    public $ageTo;

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
            ['city_id', 'integer'],
            ['gender', 'string'],
            ['specialization_id', 'integer'],
            ['salary', 'integer'],
            ['ageFrom', 'integer'],
            ['ageTo', 'integer'],
            [['schedule'], 'safe'],
            [['experience'], 'safe'],
            [['employment'], 'safe']
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = self::getAll();

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
        $query->andFilterWhere(['like', 'schedule', is_array($this->schedule) ? implode(",", $this->schedule) : $this->schedule]);
        $query->andFilterWhere(['like', 'employment', is_array($this->employment) ? implode(",", $this->employment) : $this->employment]);
        $query->andFilterWhere(['>=', 'TIMESTAMPDIFF(YEAR, birth_date, curdate())', $this->ageFrom]);
        $query->andFilterWhere(['<=', 'TIMESTAMPDIFF(YEAR, birth_date, curdate())', $this->ageTo]);

        return $dataProvider;
    }
}