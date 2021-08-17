<?php

namespace app\widgets;

use \yii\widgets\ActiveForm;
use app\models\Schedule;

class myActiveForm extends ActiveForm
{
    public function myFieldCheckbox($model, $attribute): \yii\widgets\ActiveField
    {
        return $this->field($model, $attribute, ['options' => ['class' => 'profile-info']])->checkboxList(Schedule::listData(),
            [
                'item' => function ($index, $label, $name, $checked, $value) {
                    $checked = $checked ? 'checked' : '';
                    $name = 'AddResume[schedule][' . Schedule::getConstantsByValue()[$index] . ']';
                    $id = str_replace(['[', ']'], ['', ''], 'exampleCheck') . intval($index + 6);
                    return "<div class='form-check d-flex'><input class='form-check-input' name=$name value=$value id=$id $checked type='checkbox' >"
                        . "<label class='form-check-label' for=$id></label>" . "<label for=$id class='profile-info__check-text job-resolution-checkbox'>$label</label></div>";
                }
            ]
        )->label(false);
    }
}