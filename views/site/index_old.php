<?php

/* @var $this yii\web\View */
/* @var $data */
/* @var $count */
/* @var $sort */
/* @var $city */
/* @var $pagination */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;
use \app\components\MenuFilter;
use \yii\widgets\ActiveForm;

$this->title = 'Список резюме';
?>
<div class="content">
    <div class="container">
        <div class="header-search">
            <div class="container">
                <div class="header-search__wrap">
                    <?php echo Html::beginForm(Url::toRoute('search'), 'get', ['class' => 'header-search__form']); ?>
                    <?php echo Html::a(Html::img('../../images/dark-search.svg', ['class' => 'dark-search-icon header-search__icon'])); ?>
                    <?php echo Html::input('text', 'query', null, ['class' => 'header-search__input', 'placeholder' => 'Поиск по резюме и навыкам']); ?>
                    <?php echo Html::submitButton('Найти', ['class' => 'blue-btn header-search__btn']); ?>
                    <?php echo Html::endForm(); ?>
                </div>
            </div>
        </div>
        <h1 class="main-title mt24 mb16">PHP разработчики в Кемерово</h1>
        <button class="vacancy-filter-btn">Фильтр</button>
        <div class="row">
            <div class="col-lg-9 desctop-992-pr-16">
                <div class="d-flex align-items-center flex-wrap mb8">
                    <span class="paragraph mr16">Найдено <?= $count ?> резюме</span>
                    <div class="vakancy-page-header-dropdowns">
                        <div class="vakancy-page-wrap show">
                            <a class="vakancy-page-btn vakancy-btn dropdown-toggle" href="#" role="button"
                               id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                               aria-expanded="false"> За день <i class="fas fa-angle-down arrowDown"></i>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item" href="#">За день</a>
                                    <a class="dropdown-item" href="#">За год</a>
                                    <a class="dropdown-item" href="#">За все время</a>
                                </div>
                        </div>
                        <div class="vakancy-page-wrap show">
                            <a class="vakancy-page-btn vakancy-btn dropdown-toggle" href="#" role="button"
                               id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                               aria-expanded="false"> По новизне <i class="fas fa-angle-down arrowDown"></i>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <?php
                                    echo $sort->link('date', ['class' => 'dropdown-item', 'label' => 'По дате']);
                                    echo $sort->link('salary', ['class' => 'dropdown-item', 'label' => 'По зарплате']);
                                    ?>
                                </div>
                        </div>
                    </div>
                </div>

                <?php foreach ($data as $item) : ?>
                    <div onclick="location.href='/view-resume/<?= $item->id ?>'"
                         class="vakancy-page-block company-list-search__block resume-list__block p-rel mb16"
                         style="cursor: pointer">
                        <div class="company-list-search__block-left">
                            <div class="resume-list__block-img mb8">
                                <img src="<?= $item->photo ?>" alt="profile">
                            </div>
                        </div>
                        <div class="company-list-search__block-right">
                            <div class="mini-paragraph cadet-blue mobile-mb12">Обновлено <?= $item->date ?></div>
                            <h3 class="mini-title mobile-off"><?= $item->specialization ?></h3>
                            <div class="d-flex align-items-center flex-wrap mb8 ">
                                <span class="mr16 paragraph"><?= $item->salary ?> ₽</span>
                                <span class="mr16 paragraph">Опыт работы <?= $item->experience ?></span>
                                <span class="mr16 paragraph"><?= $item->age ?> лет</span>
                                <span class="mr16 paragraph"><?= $item->city ?></span>
                            </div>
                            <p class="paragraph tbold mobile-off">Последнее место работы</p>
                        </div>
                        <div class="company-list-search__block-middle">
                            <h3 class="mini-title desktop-off">PHP разработчик</h3>
                            <p class="paragraph mb16 mobile-mb32"><?= $item->last_work ?></p>
                        </div>
                    </div>
                <?php endforeach ?>

                <?= LinkPager::widget(
                    [
                        'pagination' => $pagination,
                        'prevPageLabel' => '< Назад', 'nextPageLabel' => 'Далее >',
                        'prevPageCssClass' => 'page-link-prev', 'nextPageCssClass' => 'page-link-next',
                        'options' => ['class' => 'dor-pagination mb128'],
                    ]);
                ?>
            </div>
            <div class="col-lg-3 desctop-992-pl-16 d-flex flex-column vakancy-page-filter-block vakancy-page-filter-block-dnone">
                <div class="vakancy-page-filter-block__row mobile-flex-992 mb24 d-flex justify-content-between align-items-center">
                    <div class="heading">Фильтр</div>
                    <img class="cursor-p" src="../../images/big-cancel.svg" alt="cancel">
                </div>

                <?php ActiveForm::begin(['action' => Url::toRoute([Url::current(['filter/resume' => null, 'city' => null, '/filter/resume'])]), 'method' => 'get']); ?>
                <div class="signin-modal__switch-btns-wrap resume-list__switch-btns-wrap mb16">
                <?= Html::a('Все', ['/'], ['class' => 'signin-modal__switch-btn active']) ?>
                <?= Html::a('Мужчины', ['filter/resume', 'gender' => 'male'], ['class' => 'signin-modal__switch-btn ']) ?>
                <?= Html::a('Женщины', ['filter/resume', 'gender' => 'female'], ['class' => 'signin-modal__switch-btn ']) ?>
                </div>
                <div class="vakancy-page-filter-block__row mb24">
                    <div class="paragraph cadet-blue">Город</div>
                    <div class="citizenship-select">
                        <?= Html::dropDownList('city', $city,
                            ['Кемерово' => 'Кемерово', 'Новосибирск' => 'Новосибирск', 'Иркутск' => 'Иркутск', 'Красноярск' => 'Красноярск', 'Барнаул' => 'Барнаул'],
                            ['onchange' => 'this.form.submit()', 'prompt' => 'Выберите город', 'selected' => 'selected']);
                        ?>
                    </div>
                </div>
                <?= Html::submitButton('Показать вакансии', ['class' => 'link-orange-btn orange-btn mr24 mobile-mb12']) ?>

                <?php ActiveForm::end() ?>

                <?php
               /* echo MenuFilter::widget(
                    [
                        'items' =>
                            [
                                ['label' => 'Все', 'url' => Url::toRoute('/'), 'options' => ['tag' => false]],
                                ['label' => 'Мужчины', 'url' => Url::toRoute([Url::current(['filter/resume' => null, 'filter/resume', 'gender' => 'male'])]), 'options' => ['tag' => false]],
                                ['label' => 'Женщины', 'url' => Url::toRoute([Url::current(['filter/resume' => null, 'filter/resume', 'gender' => 'female'])]), 'options' => ['tag' => false]]
                            ], 'options' => ['tag' => 'div', 'class' => 'signin-modal__switch-btns-wrap resume-list__switch-btns-wrap mb16']
                    ]
                );*/
                ?>
<!--                <div class="vakancy-page-filter-block__row mb24">
                    <div class="paragraph cadet-blue">Город</div>
                    <div class="citizenship-select">
-->                        <?php /*ActiveForm::begin(['action' => Url::toRoute([Url::current(['filter/resume' => null, 'city' => null, '/filter/resume'])]), 'method' => 'get']); */?>
                       <!-- --><?/*= Html::dropDownList('city', $city,
                            ['Кемерово' => 'Кемерово', 'Новосибирск' => 'Новосибирск', 'Иркутск' => 'Иркутск', 'Красноярск' => 'Красноярск', 'Барнаул' => 'Барнаул'],
                            ['onchange' => 'this.form.submit()', 'prompt' => 'Выберите город', 'selected' => 'selected']);
                        */?>
                        <?php /*ActiveForm::end()*/ ?>
<!--                    </div>
                </div>
-->                <div class="vakancy-page-filter-block__row mb24">
                    <div class="paragraph cadet-blue">Зарплата</div>
                    <div class="citizenship-select">
                        <?php ActiveForm::begin(['action' => Url::toRoute([Url::current(['filter/resume' => null, 'salary' => null, '/filter/resume'])]), 'method' => 'get']); ?>
                        <?= Html::textInput('salary', '', ['onenter' => 'this.form.submit()', 'class' => 'dor-input w100']); ?>
                        <?php ActiveForm::end() ?>
                    </div>
                </div>
                <div class="vakancy-page-filter-block__row mb24">
                    <div class="paragraph cadet-blue">Специализация</div>
                    <div class="citizenship-select">
                        <?php ActiveForm::begin(['action' => Url::toRoute([Url::current(['filter/resume' => null, 'specialization' => null, '/filter/resume'])]), 'method' => 'get']); ?>
                        <?= Html::dropDownList('specialization', false,
                            ['Администратор баз данных', 'Аналитик', 'Арт-директор', 'Инженер', 'Компьютерная безопасность'],
                            ['onchange' => 'this.form.submit()', 'prompt' => 'Выберите профессию', 'selected' => true]);
                        ?>
                        <?php ActiveForm::end() ?>
                    </div>
                </div>

                <div class="vakancy-page-filter-block__row mb24">
                    <div class="paragraph cadet-blue">Возраст</div>
                    <div class="d-flex">
                        <?php ActiveForm::begin(['action' => Url::toRoute([Url::current(['filter/resume' => null, 'age_from' => null, '/filter/resume'])]), 'method' => 'get']); ?>
                        <?= Html::textInput('age_from', '', ['onblur' => 'this.form.submit()', 'class' => 'dor-input w100', 'placeholder' => 'От']); ?>
                        <?php ActiveForm::end() ?>
                        <?php ActiveForm::begin(['action' => Url::toRoute([Url::current(['filter/resume' => null, 'age_to' => null, '/filter/resume'])]), 'method' => 'get']); ?>
                        <?= Html::textInput('age_to', '', ['onenter' => 'this.form.submit()', 'class' => 'dor-input w100', 'placeholder' => 'До']); ?>
                        <?php ActiveForm::end() ?>
                    </div>
                </div>

                <div class="vakancy-page-filter-block__row mb24">
                    <div class="paragraph cadet-blue">Опыт работы</div>
                    <?php ActiveForm::begin(['action' => Url::toRoute([Url::current(['filter/resume' => null, 'experience' => null, '/filter/resume'])]), 'method' => 'get']); ?>
                    <?= Html::checkboxList('experience', false, ['Без опыта', 'От 1 года до 3 лет', 'От 3 лет до 6 лет', 'Более 6 лет'],
                        ['itemOptions' =>
                            ['labelOptions' => ['class' => 'form-check-label', 'onchange' => 'this.form.submit()', Url::to(['/', 'param' => '1'])],
                                'class' => 'form-check-input'], ['class' => 'profile-info']
                        ]
                    );
                    ?>
                    <?php ActiveForm::end() ?>

                    <!--    Html::checkboxList('experience', false, "<label class='form-check-label' for=$inputId ></label>"
                            ['Без опыта', 'От 1 года до 3 лет', 'От 3 лет до 6 лет', 'Более 6 лет'],
                            ['itemOptions' =>
                                ['labelOptions' => ['class' => 'form-check-label', 'onchange' => 'this.form.submit()'],
                                    'class' => 'form-check-input'], ['class' => 'profile-info']
                                //'template'=>'<div>{label}{input}</div>'
                            ],
                        ) -->

                    <!--Html::checkboxList( 'experience', false, ['Без опыта', 'От 1 года до 3 лет', 'От 3 лет до 6 лет', 'Более 6 лет'],
                    [
                    'item' => function($index, $label, $name, $checked, $value) {
                    $checkedLabel = $checked ? 'checked' : '';
                    $inputId = str_replace(['[', ']'], ['', ''], 'exampleCheck') . intval($index+1);
                    return "<div class='form-check d-flex'><input type='checkbox' class='form-check-input' name=$name value=$value id=$inputId $checkedLabel>"
                        . Html::tag('label', '', ['class' => 'form-check-label', "for=$inputId", 'onchange' => 'this.form.submit()']) . "<label class='profile-info__check-text' for=$inputId>$label</label></div>";
                    }, ['class' => 'profile-info']
                    ]
                    );-->


                </div>
                <div class="vakancy-page-filter-block__row mb24">
                    <div class="paragraph cadet-blue">Тип занятости</div>
                    <div class="profile-info">
                        <div class="form-check d-flex">
                            <input type="checkbox" class="form-check-input" id="exampleCheck5">
                            <label class="form-check-label" for="exampleCheck5"></label>
                            <label for="exampleCheck5" class="profile-info__check-text">Полная занятость</label>
                        </div>
                        <div class="form-check d-flex">
                            <input type="checkbox" class="form-check-input" id="exampleCheck6">
                            <label class="form-check-label" for="exampleCheck6"></label>
                            <label for="exampleCheck6" class="profile-info__check-text">Частичная
                                занятость</label>
                        </div>
                        <div class="form-check d-flex">
                            <input type="checkbox" class="form-check-input" id="exampleCheck7">
                            <label class="form-check-label" for="exampleCheck7"></label>
                            <label for="exampleCheck7" class="profile-info__check-text">Проектная работа</label>
                        </div>
                        <div class="form-check d-flex">
                            <input type="checkbox" class="form-check-input" id="exampleCheck8">
                            <label class="form-check-label" for="exampleCheck8"></label>
                            <label for="exampleCheck8" class="profile-info__check-text">Стажировка</label>
                        </div>
                        <div class="form-check d-flex">
                            <input type="checkbox" class="form-check-input" id="exampleCheck9">
                            <label class="form-check-label" for="exampleCheck9"></label>
                            <label for="exampleCheck9" class="profile-info__check-text">Волонтёрство</label>
                        </div>
                    </div>
                </div>
                <div class="vakancy-page-filter-block__row mb24">
                    <div class="paragraph cadet-blue">График работы</div>
                    <div class="profile-info">
                        <div class="form-check d-flex">
                            <input type="checkbox" class="form-check-input" id="exampleCheck10">
                            <label class="form-check-label" for="exampleCheck10"></label>
                            <label for="exampleCheck10" class="profile-info__check-text">Полный день</label>
                        </div>
                        <div class="form-check d-flex">
                            <input type="checkbox" class="form-check-input" id="exampleCheck11">
                            <label class="form-check-label" for="exampleCheck11"></label>
                            <label for="exampleCheck11" class="profile-info__check-text">Сменный график</label>
                        </div>
                        <div class="form-check d-flex">
                            <input type="checkbox" class="form-check-input" id="exampleCheck12">
                            <label class="form-check-label" for="exampleCheck12"></label>
                            <label for="exampleCheck12" class="profile-info__check-text">Вахтовый метод</label>
                        </div>
                        <div class="form-check d-flex">
                            <input type="checkbox" class="form-check-input" id="exampleCheck13">
                            <label class="form-check-label" for="exampleCheck13"></label>
                            <label for="exampleCheck13" class="profile-info__check-text">Гибкий график</label>
                        </div>
                        <div class="form-check d-flex">
                            <input type="checkbox" class="form-check-input" id="exampleCheck14">
                            <label class="form-check-label" for="exampleCheck14"></label>
                            <label for="exampleCheck14" class="profile-info__check-text">Удалённая работа</label>
                        </div>
                    </div>
                </div>
                <div class="vakancy-page-filter-block__row vakancy-page-filter-block__show-vakancy-btns mb24 d-flex flex-wrap align-items-center mobile-jus-cont-center">
                    <a class="link-orange-btn orange-btn mr24 mobile-mb12" href="#">Показать <span>1 230</span>
                        вакансии</a>
                    <a href="#">Сбросить все</a>
                </div>
            </div>
        </div>
    </div>
</div>


</div>