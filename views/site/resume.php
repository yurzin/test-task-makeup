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
<div class="content p-rel">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="mt8 mb40"><a href="my-resume"><img src="images/blue-left-arrow.svg" alt="arrow"> Вернуться
                        без сохранения</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="main-title mb24">Новое резюме</div>
            </div>
        </div>
        <div class="col-12">
            <?php
            $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
            <div class="row mb32">
                <div class="col-lg-2 col-md-3 dflex-acenter">
                    <div class="paragraph">Фото</div>
                </div>
                <div class="col-lg-3 col-md-4 col-11">
                    <div class="profile-foto-upload mb8">
                        <img id="previewPhoto" src="../../images/default.jpg" alt="Ваше фото">
                        <?= $form
                            ->field(
                                $model,
                                'imageFile',
                                ['options' => ['tag' => false]]
                            )
                            ->fileInput(
                                [
                                    'class' => 'sr-only',
                                    'onchange' => new \yii\web\JsExpression('loadPreview()')
                                ]
                            )
                            ->label(
                                'Изменить фото',
                                [
                                    'class' => 'custom-file-upload'
                                ]
                            ) ?>
                    </div>
                </div>
            </div>
            <?= $form->field(
                $model,
                'last_name',
                [
                    'options' => ['class' => 'row mb16'],
                    'template' => '<div class="col-lg-2 col-md-3 dflex-acenter">
                                        <div class="paragraph">Фамилия</div>
                                        </div>
                                        <div class="col-lg-3 col-md-4 col-11"> {input} {error} </div>'
                ]
            )->textInput(['class' => 'dor-input w100'])
                ->label(false); ?>
            <?= $form->field(
                $model,
                'name',
                [
                    'options' => ['class' => 'row mb16'],
                    'template' => '<div class="col-lg-2 col-md-3 dflex-acenter">
                                        <div class="paragraph">Имя</div>
                                        </div>
                                        <div class="col-lg-3 col-md-4 col-11"> {input} {error} </div>'
                ]
            )->textInput(['class' => 'dor-input w-100'])
                ->label(false); ?>
            <?= $form->field(
                $model,
                'patronymic',
                [
                    'options' => ['class' => 'row mb16'],
                    'template' => '<div class="col-lg-2 col-md-3 dflex-acenter">
                                        <div class="paragraph">Отчество</div>
                                        </div>
                                        <div class="col-lg-3 col-md-4 col-11"> {input} {error} </div>'
                ]
            )->textInput(['class' => 'dor-input w-100'])
                ->label(false); ?>
            <?= $form->field(
                $model,
                'birth_date',
                [
                    'options' => ['class' => 'row mb24'],
                    'template' => '<div class="col-lg-2 col-md-3 dflex-acenter">
                                        <div class="paragraph">Дата рождения</div>
                                        </div>
                                        <div class="col-lg-3 col-md-4 col-11"><div class="datepicker-wrap input-group date"> {input} {error}</div></div>'
                ]
            )->textInput(
                ['type' => 'date', 'class' => 'dor-input']
            )->label(false); ?>
            <div class="row mb16">
                <div class="col-lg-2 col-md-3 dflex-acenter">
                    <div class="paragraph">Пол</div>
                </div>
                <?php
                $model->gender = 'male';
                echo $form->field(
                    $model,
                    'gender',
                    ['options' => ['tag' => 'ul', 'class' => 'card-ul-radio profile-radio-list']]
                )
                    ->radioList(
                        ['male' => 'Мужщина', 'female' => 'Женщина'],
                        [
                            'item' => function ($index, $label, $name, $checked, $value) {
                                $checked = $checked ? 'checked' : '';
                                $id = str_replace(['[', ']'], ['', ''], 'test') . intval($index + 1);
                                return "<li><input type='radio' class='form-check-input' name=$name value=$value id=$id $checked>" . "<label for=$id>$label</label></li>";
                            },
                            ['class' => 'col-lg-3 col-md-4 col-11']
                        ]
                    )->label(false); ?>
            </div>
            <?= $form->field(
                $model,
                'city_id',
                [
                    'options' => ['class' => 'row mb16'],
                    'template' => '<div class="col-lg-2 col-md-3 dflex-acenter">
                                        <div class="paragraph">Город проживания</div>
                                        </div>
                                        <div class="col-lg-3 col-md-4 col-11"><div class="citizenship-select">{input} {error}</div></div>'
                ]
            )->dropDownList(
                $city,
                [
                    'prompt' => 'Выберите город',
                    'label' => false,
                    'class' => 'nselect-1',
                    '0' => ['Selected' => true],
                    ['data-val' => 'label']
                ]
            )->label(false); ?>

            <div class="row mb16">
                <div class="col-lg-2 col-md-3 dflex-acenter">
                    <div class="heading">Способы связи</div>
                </div>
                <div class="col-lg-7 col-10"></div>
            </div>

            <?= $form->field(
                $model,
                'email',
                [
                    'options' => ['class' => 'row mb24'],
                    'template' => '<div class="col-lg-2 col-md-3 dflex-acenter">
                                        <div class="paragraph">Электронная почта</div>
                                        </div>
                                        <div class="col-lg-3 col-md-4 col-11"><div class="p-rel"> {input} {error}</div></div>'
                ]
            )->input('email', ['class' => 'dor-input w-100'])
                ->label('E-mail'); ?>

            <?= $form->field(
                $model,
                'phone',
                [
                    'options' => ['class' => 'row mb32'],
                    'template' => '<div class="col-lg-2 col-md-3 dflex-acenter">
                                        <div class="paragraph">Телефон</div>
                                        </div>
                                        <div class="col-lg-3 col-md-4 col-11"><div class="p-rel mobile-w100"> {input} {error}</div></div>'
                ]
            )->widget(
                MaskedInput::class,
                [
                    'mask' => '9-999-999-9999',
                    'options' => [
                        'class' => 'dor-input w-100',
                        'id' => 'phone',
                        'placeholder' => ('Контактный телефон')
                    ]
                ]
            )->label('Телефон'); ?>

            <div class="row mb24">
                <div class="col-12">
                    <div class="heading">Желаемая должность</div>
                </div>
            </div>

            <?= $form->field(
                $model,
                'specialization_id',
                [
                    'options' => ['class' => 'row mb16'],
                    'template' => '<div class="col-lg-2 col-md-3 dflex-acenter">
                                        <div class="paragraph">Специализация</div>
                                        </div>
                                        <div class="col-lg-3 col-md-4 col-11"><div class="citizenship-select">{input} {error}</div></div>'
                ]
            )->dropDownList(
                $specialization,
                [
                    'prompt' => 'Выберите специализацию',
                    'label' => false,
                    'class' => 'nselect-1',
                    '0' => ['Selected' => true],
                    ['data-val' => 'label']
                ]
            )->label(false); ?>

            <?= $form->field(
                $model,
                'salary',
                [
                    'options' => ['class' => 'row mb16'],
                    'template' => '<div class="col-lg-2 col-md-3 dflex-acenter">
                                        <div class="paragraph">Зарплата</div>
                                        </div>
                                        <div class="col-lg-3 col-md-4 col-11"> {input} {error}<img class="rub-icon" src="images/rub-icon.svg" alt="rub-icon"></div>'
                ]
            )->textInput(['type' => 'number', 'placeholder' => 'От', 'min' => 0, 'class' => 'dor-input w-100'])
                ->label(false); ?>

            <div class="row mb32">
                <div class="col-lg-2 col-md-3">
                    <div class="paragraph">Занятость</div>
                </div>
                <div class="col-lg-3 col-md-4 col-11">
                    <?php
                    $model->employment = '1';
                    echo $form->field(
                        $model,
                        'employment',
                        ['options' => ['class' => 'profile-info']]
                    )->checkboxList(
                        [
                            1 => 'Полная занятость',
                            2 => 'Частичная занятость',
                            3 => 'Проектная/Временная работа',
                            4 => 'Волонтёрство',
                            5 => 'Стажировка'
                        ],
                        [
                            'item' => function ($index, $label, $name, $checked, $value) {
                                $checked = $checked ? 'checked' : '';
                                $id = str_replace(['[', ']'], ['', ''], 'exampleCheck') . intval($index + 1);
                                return "<div class='form-check d-flex'><input class='form-check-input' name=$name value=$value id=$id $checked type='checkbox' >"
                                    . "<label class='form-check-label' for=$id></label>" . "<label for=$id class='profile-info__check-text job-resolution-checkbox'>$label</label></div>";
                            }
                        ]
                    )->label(false); ?>
                </div>
            </div>
            <div class="row mb32">
                <div class="col-lg-2 col-md-3">
                    <div class="paragraph">График работы</div>
                </div>
                <div class="col-lg-3 col-md-4 col-11">
                    <?php
                    $model->schedule = '1';
                    echo $form->field(
                        $model,
                        'schedule',
                        ['options' => ['class' => 'profile-info']]
                    )->checkboxList(
                        [
                            1 => 'Полный день',
                            2 => 'Сменный график',
                            3 => 'Гибкий график',
                            4 => 'Удалённая работа',
                            5 => 'Вахтовый метод'
                        ],
                        [
                            'item' => function ($index, $label, $name, $checked, $value) {
                                $checked = $checked ? 'checked' : '';
                                $id = str_replace(['[', ']'], ['', ''], 'exampleCheck') . intval($index + 6);
                                return "<div class='form-check d-flex'><input class='form-check-input' name=$name value=$value id=$id $checked type='checkbox' >"
                                    . "<label class='form-check-label' for=$id></label>" . "<label for=$id class='profile-info__check-text job-resolution-checkbox'>$label</label></div>";
                            }
                        ]
                    )->label(false); ?>
                </div>
            </div>

            <div class="row mb32">
                <div class="col-12">
                    <div class="heading">Опыт работы</div>
                </div>
            </div>
            <div class="row mb32">
                <div class="col-lg-2 col-md-3">
                    <div class="paragraph">Опыт работы</div>
                </div>
                <?php
                $model->experience = '1';
                echo $form->field(
                    $model,
                    'experience',
                    ['options' => ['tag' => 'ul', 'class' => 'card-ul-radio profile-radio-list']]
                )
                    ->radioList(
                        [1 => 'Нет опыта работы', 2 => 'Есть опыт работы'],
                        [
                            'item' => function ($index, $label, $name, $checked, $value) {
                                $checked = $checked ? 'checked' : '';
                                $id = str_replace(['[', ']'], ['', ''], 'test') . intval($index + 3);
                                return "<li><input type='radio' class='form-check-input' name=$name value=$value id=$id $checked onchange=toggleDiv()>" . "<label for=$id>$label</label></li>";
                            },
                            ['class' => 'col-lg-3 col-md-4 col-11']
                        ]
                    )->label(false); ?>
            </div>
            <div id="more" style="display:none">
                <div class="row mb24">
                    <div class="col-lg-2 col-md-3 dflex-acenter">
                        <div class="paragraph">Начало работы</div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-11">
                        <div class="d-flex justify-content-between">
                            <div class="citizenship-select w100 mr16">
                                <?= $form->field($model, 'start_month')
                                    ->dropDownList(
                                        [
                                            'Январь' => 'Январь',
                                            'Февраль' => 'Февраль',
                                            'Март' => 'Март',
                                            'Апрель' => 'Апрель',
                                            'Май' => 'Май',
                                            'Июнь' => 'Июнь',
                                            'Июль' => 'Июль',
                                            'Август' => 'Август',
                                            'Сентябрь' => 'Сентябрь',
                                            'Октябрь' => 'Октябрь',
                                            'Ноябрь' => 'Ноябрь',
                                            'Декабрь' => 'Декабрь',
                                        ],
                                        [
                                            'class' => 'nselect-1',
                                            '1' => ['Selected' => true],
                                        ]
                                    )
                                    ->label(false); ?>
                            </div>

                            <?= $form->field(
                                $model,
                                'start_year',
                                [
                                    'options' => ['class' => 'citizenship-select w100']
                                ]
                            )->textInput(
                                [
                                    'type' => 'number',
                                    'placeholder' => '2006',
                                    'min' => 1900,
                                    'max' => 2021,
                                    'class' => 'dor-input w-100'
                                ]
                            )
                                ->label(false); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb8">
                    <div class="col-lg-2 col-md-3 dflex-acenter">
                        <div class="paragraph">Окончание работы</div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-11">
                        <div class="d-flex justify-content-between">
                            <div class="citizenship-select w100 mr16">
                                <?= $form->field($model, 'end_month')
                                    ->dropDownList(
                                        [
                                            'Январь' => 'Январь',
                                            'Февраль' => 'Февраль',
                                            'Март' => 'Март',
                                            'Апрель' => 'Апрель',
                                            'Май' => 'Май',
                                            'Июнь' => 'Июнь',
                                            'Июль' => 'Июль',
                                            'Август' => 'Август',
                                            'Сентябрь' => 'Сентябрь',
                                            'Октябрь' => 'Октябрь',
                                            'Ноябрь' => 'Ноябрь',
                                            'Декабрь' => 'Декабрь',
                                        ],
                                        [
                                            'class' => 'nselect-1',
                                            '1' => ['Selected' => true],
                                        ]
                                    )
                                    ->label(false); ?>
                            </div>
                            <?= $form->field(
                                $model,
                                'end_year',
                                [
                                    'options' => ['class' => 'citizenship-select w100']
                                ]
                            )->textInput(
                                [
                                    'type' => 'number',
                                    'placeholder' => '2006',
                                    'min' => 1900,
                                    'max' => 2021,
                                    'class' => 'dor-input w-100'
                                ]
                            )
                                ->label(false); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb32">
                    <div class="col-lg-2 col-md-3">
                    </div>
                    <div class="col-lg-3 col-md-4 col-11">
                        <div class="profile-info">
                            <div class="form-check d-flex">
                                <input type="checkbox" class="form-check-input" id="exampleCheck111">
                                <label class="form-check-label" for="exampleCheck111"></label>
                                <label for="exampleCheck111"
                                       class="profile-info__check-text job-resolution-checkbox">По настоящее
                                    время</label>
                            </div>
                        </div>
                    </div>
                </div>

                <?= $form->field(
                    $model,
                    'organization',
                    [
                        'options' => ['class' => 'row mb16'],
                        'template' => '<div class="col-lg-2 col-md-3 dflex-acenter">
                                        <div class="paragraph">Организация</div>
                                        </div>
                                        <div class="col-lg-3 col-md-4 col-11"> {input} {error} </div>'
                    ]
                )->textInput(['class' => 'dor-input w100'])
                    ->label(false); ?>

                <?= $form->field(
                    $model,
                    'position',
                    [
                        'options' => ['class' => 'row mb16'],
                        'template' => '<div class="col-lg-2 col-md-3 dflex-acenter">
                                        <div class="paragraph">Должность</div>
                                        </div>
                                        <div class="col-lg-3 col-md-4 col-11"> {input} {error} </div>'
                    ]
                )->textInput(['class' => 'dor-input w100'])
                    ->label(false); ?>
                <div class="row mb16">
                    <div class="col-lg-2 col-md-3">
                        <div class="paragraph">Обязанности, функции, достижения</div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12">
                            <textarea class="dor-input w100 h96 mb8"
                                      placeholder="Расскажите о своих обязанностях, функциях и достижениях"></textarea>
                        <div><a href="#">Удалить место работы</a></div>
                        <div><a href="#">+ Добавить место работы</a></div>
                    </div>
                </div>

            </div>
        <div class="row mb32">
            <div class="col-12">
                <div class="heading">Расскажите о себе</div>
            </div>
        </div>
        <div class="row mb64 mobile-mb32">
            <div class="col-lg-2 col-md-3">
                <div class="paragraph">О себе</div>
            </div>
            <?= $form->field(
                $model,
                'about',
                ['options' => ['class' => 'col-lg-5 col-md-7 col-12']]
            )->textarea(['class' => 'dor-input w100 h176 mb8'])
                ->label(false); ?>
        </div>
        <div class="row mb128 mobile-mb64">
            <div class="col-lg-2 col-md-3">
            </div>
            <div class="col-lg-10 col-md-9">
                <?= Html::submitButton(
                    'Добавить резюме',
                    ['class' => 'orange-btn link-orange-btn']
                ) ?>
            </div>
        </div>
        <?php
        ActiveForm::end(); ?>
    </div>
</div>
</div>

<script>
    const loadPreview = () => {
        const selectedFile = document.getElementById('addresume-imagefile').files[0];
        document.getElementById('previewPhoto').src = URL.createObjectURL(selectedFile);
    }
</script>

<script>
    const toggleDiv = () => {
        const more = document.getElementById("more");
        if (more.style.display === "none") {
            more.style.display = "block";
        } else {
            more.style.display = "none";
        }
    }
</script>