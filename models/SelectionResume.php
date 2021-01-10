<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

class SelectionResume extends Resume
{
    public $ageFrom;
    public $ageTo;
//    public $age;
//    public $experience;

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
/*            ['experience', 'string'],
            ['schedule', 'string'],
            ['employment', 'string'],*/
            ['salary', 'integer'],
            ['ageFrom', 'integer'],
            ['ageTo', 'integer'],
            [['experience'], 'safe'],
            [['employment'], 'safe'],
            [['schedule'], 'safe']
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = self::getAllResume();

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
        $query->andFilterWhere(['experience' => implode(",", $this->experience)]);
        $query->andFilterWhere(['schedule' =>  $this->schedule]);
        $query->andFilterWhere(['employment' => implode(",", $this->employment)]);
        $query->andFilterWhere(['specialization_id' => $this->specialization]);
        $query->andFilterWhere(['>=', 'TIMESTAMPDIFF(YEAR, birth_date, curdate())', $this->ageFrom]);
        $query->andFilterWhere(['<=', 'TIMESTAMPDIFF(YEAR, birth_date, curdate())', $this->ageTo]);

        return $dataProvider;
    }
}