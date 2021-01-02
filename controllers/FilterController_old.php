<?php

namespace app\controllers;

use app\models\FilterResume;
use Yii;
use yii\web\Controller;
use app\models\Filter;
use app\models\Resume;
use yii\data\Pagination;
use yii\data\Sort;
use yii\helpers\ArrayHelper;

class FilterController extends Controller
{
    public function actionIndex()
    {
        //$get = Yii::$app->request->get();

        $filter = new Filter();

        $searchModel = new FilterResume();
        $dataProvider = $searchModel->search(Yii::$app->request->get());

        // $city = ArrayHelper::getValue($get, 'city');
        // $specialization = ArrayHelper::getValue($get, 'specialization');
        // $salary = ArrayHelper::getValue($get, 'salary');
        // $age_from = intval(ArrayHelper::getValue($get, 'age_from'));
        // $age_to = ArrayHelper::getValue($get, 'age_to', 100);
        // $gender = ArrayHelper::getValue($get, 'gender');

        // $sort = new Sort(
        //     [
        //         'defaultOrder' => [
        //             'date' => SORT_DESC
        //         ],
        //         'attributes' => [
        //             'date',
        //             'salary'
        //         ],
        //         'sortParam' => 'type',
        //         'route' => 'sort'
        //     ]
        // );

        // $resume = Resume::find()
        //     ->andFilterWhere(
        //         [
        //             'city' => $city,
        //             'gender' => $gender,
        //             'salary' => $salary,
        //             'specialization' => $specialization
        //         ]
        //     )
        //     ->andFilterCompare('age', ">$age_from")
        //     ->andFilterCompare('age', "<$age_to");

        // $count = $resume->count();

        // $pagination = new Pagination(
        //     [
        //         'defaultPageSize' => 4,
        //         'totalCount' => $count,
        //         'route' => 'filter'
        //     ]
        // );

        // $resume = $resume->offset($pagination->offset)->limit($pagination->limit)->orderBy($sort->orders)->all();

        return $this->render(
            'index',
            compact(
                // 'resume',
                // 'pagination',
                // 'count',
                // 'sort',
                //'city',
                // 'salary',
                // 'filter',
                //'specialization',
                'searchModel',
                'dataProvider'
            )
        );
    }
}