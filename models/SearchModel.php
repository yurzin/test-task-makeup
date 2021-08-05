<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * SearchModel represents the model behind the search form of `app\models\Resume`.
 */

class SearchModel extends Resume
{

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Resume::find();

        $query->joinWith(['city', 'organization', 'specialization'], true, 'LEFT JOIN');

        /*
        $query->leftJoin('city', 'resume.city_id = city.id');
        $query->leftJoin('organization', 'resume.id = organization.resume_id');
        */

        $dataProvider = new ActiveDataProvider(
            [
                'query' => $query,
                'pagination' => [
                    'pageSize' => 4,
                ],
            ]
        );

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->where(['like', 'resume.name', $params]);
        $query->orWhere(['like', 'resume.last_name', $params]);
        $query->orWhere(['like', 'resume.patronymic', $params]);
        $query->orWhere(['like', 'resume.about', $params]);
        $query->orWhere(['like', 'resume.email', $params]);
        $query->orWhere(['like', 'resume.phone', $params]);
        $query->orWhere(['like', 'city.name', $params]);
        $query->orWhere(['like', 'organization.name', $params]);
        $query->orWhere(['like', 'specialization.name', $params]);

        return $dataProvider;
    }
}