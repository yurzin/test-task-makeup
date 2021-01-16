<?php
/* @var $this yii\web\View */

/* @var $city */
/* @var $salary */

/* @var $specialization */

use app\models\FormFilter;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$model = new FormFilter();

?>
<?php
$form = ActiveForm::begin(['action' => 'selection-resume', 'method' => 'get']); ?>

    <div class="signin-modal__switch-btns-wrap resume-list__switch-btns-wrap mb16">

        <?= Html::a('Все', ['/selection-resume', 'gender' => 'all'], ['class' => 'signin-modal__switch-btn']) ?>
        <?= Html::a(
            'Мужчины',
            ['/selection-resume', 'gender' => '1'],
            ['class' => 'signin-modal__switch-btn']
        ) ?>
        <?= Html::a(
            'Женщины',
            ['/selection-resume', 'gender' => '2'],
            ['class' => 'signin-modal__switch-btn', 'on']
        ) ?>
    </div>

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
                        [
                            1 => 'Полная занятость',
                            2 => 'Частичная занятость',
                            3 => 'Проектная работа',
                            4 => 'Стажировка',
                            5 => 'Волонтёрство'
                        ],
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
                        [
                            1 => 'Полный день',
                            2 => 'Сменный график',
                            3 => 'Вахтовый метод',
                            4 => 'Гибкий график',
                            5 => 'Удалённая работа'
                        ],
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
    <div class="vakancy-page-filter-block__row vakancy-page-filter-block__show-vakancy-btns mb24 d-flex flex-wrap align-items-center mobile-jus-cont-center">
        <?= Html::submitButton(
            'Показать вакансии',
            ['class' => 'link-orange-btn orange-btn mr24 mobile-mb12', 'id' => 'my-button-handler']
        ) ?>
    </div>
<?php
ActiveForm::end(); ?>