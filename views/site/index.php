<?php

/* @var $this yii\web\View */

/* @var $resume */
/* @var $count */
/* @var $sort */
/* @var $city */
/* @var $viewModel */
/* @var $pagination */
/* @var $specialization */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;
use \app\components\SidebarWidget;

$this->title = 'Список резюме';

\yii\helpers\VarDumper::dump($viewModel, 3, true);

?>
<div class="content">
    <div class="container">
        <div class="header-search">
            <div class="container">
                <div class="header-search__wrap">
                    <?php
                    echo Html::beginForm(Url::toRoute('/search'), 'get', ['class' => 'header-search__form']); ?>
                    <?php
                    echo Html::a(
                        Html::img('../../images/dark-search.svg', ['class' => 'dark-search-icon header-search__icon'])
                    ); ?>
                    <?php
                    echo Html::input(
                        'text',
                        'query',
                        null,
                        ['class' => 'header-search__input', 'placeholder' => 'Поиск по резюме и навыкам']
                    ); ?>
                    <?php
                    echo Html::submitButton('Найти', ['class' => 'blue-btn header-search__btn']); ?>
                    <?php
                    echo Html::endForm(); ?>
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

                <?php foreach ($resume as $item) : ?>
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
                            <h3 class="mini-title mobile-off"><?= $item->specialization->specialization ?></h3>
                            <div class="d-flex align-items-center flex-wrap mb8 ">
                                <span class="mr16 paragraph"><?= $item->salary ?> ₽</span>
                                <span class="mr16 paragraph"> <?= $item->experience == 1 ? 'Нет опыта работы' : 'Опыт работы ' . Yii::$app->i18n->format(
                                            '{n, plural, one{# год} few{# года} many{# лет} other{# года}}',
                                            ['n' => $item->organization->experience],
                                            'ru_RU'
                                        ) ?></span>
                                <span class="mr16 paragraph"><?= Yii::$app->i18n->format(
                                        '{n, plural, one{# год} few{# года} many{# лет} other{# года}}',
                                        ['n' => /*$viewModel->getAge()*/ 333],
                                        'ru_RU'
                                    ); ?></span>
                                <span class="mr16 paragraph"><?= $item->city->name ?></span>
                            </div>
                            <p class="paragraph tbold mobile-off">Последнее место работы</p>
                        </div>
                        <div class="company-list-search__block-middle">
                            <h3 class="mini-title desktop-off">PHP разработчик</h3>
                            <p class="paragraph mb16 mobile-mb32"><?= $item->organization->organization != '' ? $item->organization->organization : 'Тунеядец' ?></p>
                        </div>
                    </div>
                <?php
                endforeach ?>
                <?= LinkPager::widget(
                    [
                        'pagination' => $pagination,
                        'prevPageLabel' => '< Назад',
                        'nextPageLabel' => 'Далее >',
                        'prevPageCssClass' => 'page-link-prev',
                        'nextPageCssClass' => 'page-link-next',
                        'options' => ['class' => 'dor-pagination mb128'],
                    ]
                );
                ?>
            </div>
            <div class="col-lg-3 desctop-992-pl-16 d-flex flex-column vakancy-page-filter-block vakancy-page-filter-block-dnone">
                <div class="vakancy-page-filter-block__row mobile-flex-992 mb24 d-flex justify-content-between align-items-center">
                    <div class="heading">Фильтр</div>
                    <img class="cursor-p" src="../../images/big-cancel.svg" alt="cancel">
                </div>
                <?= SidebarWidget::widget(['city' => $city, 'specialization' => $specialization]) ?>
            </div>
        </div>
    </div>
</div>