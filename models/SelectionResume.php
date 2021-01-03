<?php

namespace app\models;

use Yii;
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
            ['city', 'string'],
            ['specialization', 'string'],
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
        $query = Resume::find();

        $dataProvider = new ActiveDataProvider(
            [
                'query' => $query,
                'pagination' => [
                    'pageSize' => 3,
                ],
            ]
        );

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere(['city' => $this->city]);
        $query->andFilterWhere(['specialization' => $this->specialization]);
        $query->andFilterWhere(['>=', 'TIMESTAMPDIFF(YEAR, birthDate, curdate())', $this->ageFrom]);
        $query->andFilterWhere(['<=', 'TIMESTAMPDIFF(YEAR, birthDate, curdate())', $this->ageTo]);

        return $dataProvider;
    }
}