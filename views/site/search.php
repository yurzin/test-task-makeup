<?php

/* @var $this yii\web\View */
/* @var $data */
/* @var $count */
/* @var $sort */
/* @var $city */
/* @var $salary */
/* @var $filter */
/* @var $final */
/* @var $get */
/* @var $specialization */
/* @var $pagination */

use yii\widgets\LinkPager;

$this->title = 'Список резюме';
?>
<div class="content">
    <div class="container">
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
                            <h3 class="mini-title mobile-off"><?= $item->id_specialization ?></h3>
                            <div class="d-flex align-items-center flex-wrap mb8 ">
                                <span class="mr16 paragraph"><?= $item->salary ?> ₽</span>
                                <span class="mr16 paragraph">Опыт работы <?= $item->experience ?></span>
                                <span class="mr16 paragraph"><?= $item->age ?> лет</span>
                                <span class="mr16 paragraph"><?= $item->id_city ?></span>
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
        </div>
    </div>
</div>
</div>
</div>
</div>