<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

class SelectionResume extends Resume
{
    public $ageFrom;
    public $ageTo;
    public $age;
    public $experience;

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
            ['city', 'string'],
            ['gender', 'string'],
            ['specialization', 'string'],
            ['experience', 'string'],
            ['employment', 'string'],
            ['salary', 'integer'],
            ['ageFrom', 'integer'],
            ['ageTo', 'integer']
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search($params)
    {

        $query = self::find()
            ->select(
                [
                    '{{resume}}.*',
                    'TIMESTAMPDIFF(YEAR, birthDate, curdate()) AS age'
                ]
            );

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

        $query->andFilterWhere(['city' => $this->city]);
        $query->andFilterWhere(['salary' => $this->salary]);
        $query->andFilterWhere(['gender' => $this->gender]);
        $query->andFilterWhere(['experience' => $this->experience]);
        $query->andFilterWhere(['employment' => $this->employment]);
        $query->andFilterWhere(['specialization' => $this->specialization]);
        $query->andFilterWhere(['>=', 'TIMESTAMPDIFF(YEAR, birthDate, curdate())', $this->ageFrom]);
        $query->andFilterWhere(['<=', 'TIMESTAMPDIFF(YEAR, birthDate, curdate())', $this->ageTo]);

        return $dataProvider;
    }
}