<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ListView;
use app\components\SidebarWidget;

/* @var $dataProvider */
/* @var $viewModel */

$this->title = 'Список найденых резюме';

$totalCount = $dataProvider->getTotalCount();

if (!empty($_GET)) {
    $new_get = array_filter($_GET);
    if (count($new_get) < count($_GET)) {
        $request_uri = parse_url('http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'], PHP_URL_PATH);
        header('Location: ' . $request_uri . '?' . http_build_query($new_get));
        exit;
    }
}

?>

<div class="content">
    <div class="container">
        <div class="header-search">
            <div class="container">
                <div class="header-search__wrap">
                    <?php
                    echo Html::beginForm(Url::toRoute('/search-resume'), 'get', ['class' => 'header-search__form']); ?>
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
                    <span class="paragraph mr16">Найдено <?= $totalCount ?> резюме</span>
                </div>
                <?php
                echo ListView::widget(
                    [
                        'dataProvider' => $dataProvider,
                        'viewParams' => ['viewModel' => $viewModel],
                        'options' => [
                            'tag' => false
                        ],
                        'layout' => "{items}\n{pager}",
                        'itemView' => '_selection',
                        'itemOptions' => [
                            'tag' => false,
                        ],
                        'pager' => [
                            'prevPageLabel' => '< Назад',
                            'nextPageLabel' => 'Далее >',
                            'prevPageCssClass' => 'page-link-prev',
                            'nextPageCssClass' => 'page-link-next',
                            'options' => ['class' => 'dor-pagination mb128'],
                        ]
                    ]
                );
                ?>
            </div>

            <div class="col-lg-3 desctop-992-pl-16 d-flex flex-column vakancy-page-filter-block vakancy-page-filter-block-dnone">
                <div class="vakancy-page-filter-block__row mobile-flex-992 mb24 d-flex justify-content-between align-items-center">
                    <div class="heading">Фильтр</div>
                    <img class="cursor-p" src="../../images/big-cancel.svg" alt="cancel">
                </div>
                <?= SidebarWidget::widget(['city' => $viewModel->city, 'specialization' => $viewModel->specialization]) ?>
            </div>

        </div>
    </div>
</div>
