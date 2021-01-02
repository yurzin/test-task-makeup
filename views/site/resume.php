<?php
/* @var $model */

/* @var $city */

/* @var $specialization */

use yii\helpers\Html;
use \yii\widgets\ActiveForm;
use yii\widgets\MaskedInput;

?>

<?php
if (Yii::$app->session->hasFlash('success')): ?>
    <?php
    if (Yii::$app->session->getFlash('success')): ?>
        <p>Данные формы записаны в базу данных</p>
    <?php
    else: ?>
        <p>Данные формы не прошли валидацию</p>
    <?php
    endif; ?>
<?php
endif; ?>
<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                <div class="form-group m-2 form-control-lg">
                    <?php
                    $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
                    <?= $form->field($model, 'imageFile')->fileInput(['class' => 'sr-only'])->label(
                        'Выберите фото',
                        ['class' => 'btn btn-primary']
                    ) ?>
                    <?= $form->field($model, 'photo')->hiddenInput()->label(false); ?>
                    <?= $form->field($model, 'lastName')->textInput(['class' => 'form-control-lg']); ?>
                    <?= $form->field($model, 'name')->textInput(['class' => 'form-control-lg']); ?>
                    <?= $form->field($model, 'patronymic')->textInput(['class' => 'form-control-lg']); ?>
                    <?= $form->field($model, 'gender')->dropDownList(
                        ['Мужщина', 'Женщина'],
                        [
                            'label' => false,
                            'class' => 'nselect-1',
                            '0' => ['Selected' => true],
                            ['data-val' => 'label']
                        ]
                    ); ?>
                    <?= $form->field($model, 'dateBirth')->textInput(
                        ['type' => 'date', 'class' => 'form-control-lg']
                    ); ?>
                    <?= $form->field($model, 'city')->dropDownList(
                        $city,
                        [
                            'prompt' => 'Выберите город',
                            'label' => false,
                            'class' => 'nselect-1',
                            '0' => ['Selected' => true],
                            ['data-val' => 'label']
                        ]
                    ); ?>
                    <?= $form->field($model, 'phone')->widget(
                        MaskedInput::class,
                        [
                            'mask' => '9-999-999-9999',
                            'options' => [
                                'class' => 'form-control-lg',
                                'id' => 'phone',
                                'placeholder' => ('Контактный телефон')
                            ]
                        ]
                    ); ?>
                    <?= $form->field($model, 'email')->input('email', ['class' => 'form-control-lg']); ?>
                    <?= $form->field($model, 'specialization')->dropDownList(
                        $specialization,
                        [
                            'prompt' => 'Выберите специализацию',
                            'label' => false,
                            'class' => 'nselect-1',
                            '0' => ['Selected' => true],
                            ['data-val' => 'label']
                        ]
                    ); ?>
                    <?= $form->field($model, 'salary')->textInput(
                        ['type' => 'number', 'min' => 0, 'class' => 'form-control-lg']
                    ); ?>
                    <?= $form->field($model, 'employment')->dropDownList(
                        [
                            'Полная занятость',
                            'Частичная занятость',
                            'Проектная/Временная работа',
                            'Волонтёрство',
                            'Стажировка'
                        ],
                        [
                            'label' => false,
                            'class' => 'nselect-1',
                            '0' => ['Selected' => true],
                            ['data-val' => 'label']
                        ]
                    ); ?>
                    <?= $form->field($model, 'schedule')->dropDownList(
                        [
                            'Полный день',
                            'Сменный график',
                            'Гибкий график',
                            'Удалённая работа',
                            'Вахтовый метод'
                        ],
                        [
                            'label' => false,
                            'class' => 'nselect-1',
                            '0' => ['Selected' => true],
                            ['data-val' => 'label']
                        ]
                    ); ?>
                    <?= $form->field($model, 'experience')->dropDownList(
                        ['Нет опыта работы', 'Есть опыт работы'],
                        [
                            'label' => false,
                            'class' => 'nselect-1',
                            '0' => ['Selected' => true],
                            ['data-val' => 'label']
                        ]
                    ); ?>
                    <?= $form->field($model, 'lastWork')->textInput(['class' => 'form-control-lg']); ?>
                    <?= $form->field($model, 'about')->textarea(['rows' => '6', 'class' => 'form-control-lg']); ?>
                    <?= Html::submitButton(
                        'Добавить резюме',
                        ['class' => 'link-orange-btn orange-btn my-vacancies-add-btn']
                    ) ?>
                    <?php
                    ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
