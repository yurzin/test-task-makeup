<?php
/* @var $this yii\web\View */

/* @var $city */
/* @var $salary */

/* @var $specialization */

use app\models\Employments;
use app\models\FormFilter;
use app\models\Gender;
use app\models\Schedule;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$model = new FormFilter();

?>
<?php
$form = ActiveForm::begin(['action' => 'selection-resume', 'method' => 'get']); ?>

<?php
$model->gender = '0';
echo $form->field(
    $model,
    'gender',
    ['options' => ['tag' => 'div', 'class' => "signin-modal__switch-btns-wrap resume-list__switch-btns-wrap mb16 d-flex justify-content-center"]]
)
    ->radioList(
        [0 => 'Все', 1 => 'Мужчины', 2 => 'Женщины'],
        [
            'item' => function ($index, $label, $name, $checked, $value) {
                $checked = $checked ? 'checked' : '';
                $id = str_replace(['[', ']'], ['', ''], 'gender') . intval($index + 1);
                return "<input id=$id type='radio' class='signin-modal__switch-btn' name=$name value=$value $checked> <label class='gender' for=$id>$label</label>";
            }
        ]
    )->label(false);
?>

    <div class="vakancy-page-filter-block__row mb1">
        <div class="paragraph cadet-blue">Город</div>
        <div class="citizenship-select">
            <?= $form->field($model, 'city_id', ['options' => ['tag' => false]])->dropDownList(
                $city,
                [
                    'prompt' => 'Выберите город',
                    'class' => 'nselect-1',
                ]
            )->label(false); ?>
        </div>
    </div>
    <div class="vakancy-page-filter-block__row mb1">
        <div class="paragraph cadet-blue">Зарплата</div>
        <div class="citizenship-select">
            <?= $form->field($model, 'salary', ['options' => ['tag' => false]])->textInput(
                ['value' => $salary, 'class' => 'dor-input w100']
            )->label(false); ?>
        </div>
    </div>
    <div class="vakancy-page-filter-block__row mb1">
        <div class="paragraph cadet-blue">Специализация</div>
        <div class="citizenship-select">
            <?= $form->field($model, 'specialization_id')->dropDownList(
                $specialization,
                [
                    'prompt' => 'Выберите специализацию',
                    'label' => false,
                    'class' => 'nselect-1'
                ]
            )->label(false);
            ?>
        </div>
    </div>
    <div class="vakancy-page-filter-block__row mb1">
        <div class="paragraph cadet-blue">Возраст</div>
        <div class="d-flex">
            <?= $form->field($model, 'ageFrom', ['options' => ['tag' => false]])->textInput(
                ['class' => 'dor-input w100', 'placeholder' => 'От']
            )->label(false); ?>
            <?= $form->field($model, 'ageTo', ['errorOptions' => ['tag' => false]])->textInput(
                ['class' => 'dor-input w100', 'placeholder' => 'До']
            )->label(false); ?>
        </div>
    </div>
    <div class="vakancy-page-filter-block__row mb1">
        <div class="paragraph cadet-blue">Опыт работы</div>
        <div class="profile-info">
            <div class="form-check d-flex">
                <?= $form->field($model, 'experience', ['options' => ['tag' => false]])->checkboxList(
                    [1 => 'Без опыта', 2 => 'От 1 года до 3 лет', 3 => 'От 3 лет до 6 лет', 4 => 'Более 6 лет'],
                    [
                        'item' => function ($index, $label, $name, $checked, $value) {
                            $checked = $checked ? 'checked' : '';
                            $id = str_replace(['[', ']'], ['', ''], 'exampleCheck') . intval($index + 1);
                            return "<div class='form-check d-flex'><input type='checkbox' class='form-check-input' name=$name value=$value id=$id $checked>"
                                . "<label class='form-check-label' for=$id></label>" . "<label class='profile-info__check-text' for=$id>$label</label></div>";
                        },
                        ['class' => 'profile-info']
                    ]
                )
                    ->label(false); ?>
            </div>
        </div>
    </div>
    <div class="vakancy-page-filter-block__row mb1">
        <div class="paragraph cadet-blue">Тип занятости</div>
        <div class="profile-info">
            <div class="form-check d-flex">
                <?= $form->field($model, 'employment', ['options' => ['tag' => false]])
                    ->checkboxList(
                        Employments::listData(),
                        [
                            'item' => function ($index, $label, $name, $checked, $value) {
                                $checked = $checked ? 'checked' : '';
                                $id = str_replace(['[', ']'], ['', ''], 'exampleCheck') . intval($index + 5);
                                return "<div class='form-check d-flex'><input type='checkbox' class='form-check-input' name=$name value=$value id=$id $checked>"
                                    . "<label class='form-check-label' for=$id></label>" . "<label class='profile-info__check-text' for=$id>$label</label></div>";
                            },
                            ['class' => 'profile-info']
                        ]
                    )
                    ->label(false); ?>
            </div>
        </div>
    </div>
    <div class="vakancy-page-filter-block__row mb1">
        <div class="paragraph cadet-blue">График работы</div>
        <div class="profile-info">
            <div class="form-check d-flex">
                <?= $form->field($model, 'schedule', ['options' => ['tag' => false]])
                    ->checkboxList(
                        Schedule::listData(),
                        [
                            'item' => function ($index, $label, $name, $checked, $value) {
                                $checked = $checked ? 'checked' : '';
                                $id = str_replace(['[', ']'], ['', ''], 'exampleCheck') . intval($index + 10);
                                return "<div class='form-check d-flex'><input type='checkbox' class='form-check-input' name=$name value=$value id=$id $checked>"
                                    . "<label class='form-check-label' for=$id></label>" . "<label class='profile-info__check-text' for=$id>$label</label></div>";
                            },
                            ['class' => 'profile-info']
                        ]
                    )->label(false); ?>
            </div>
        </div>
    </div>
    <div class="vakancy-page-filter-block__row vakancy-page-filter-block__show-vakancy-btns mt-3 mb24 d-flex flex-wrap align-items-center mobile-jus-cont-center">
        <?= Html::submitButton(
            'Показать вакансии',
            ['class' => 'link-orange-btn orange-btn mr24 mobile-mb12', 'id' => 'my-button-handler']
        ) ?>
    </div>
<?php
ActiveForm::end(); ?>