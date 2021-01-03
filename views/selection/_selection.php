<?php

/* @var $selectionModel */

?>

<div class="vakancy-page-block company-list-search__block resume-list__block p-rel mb16">
    <div class="company-list-search__block-left">
        <div class="resume-list__block-img mb8">
            <img src="<?= $model->photo ?>" alt="">
        </div>
    </div>
    <div class="company-list-search__block-right">
        <div class="mini-paragraph cadet-blue mobile-mb12">Обновлено</div>
        <h3 class="mini-title mobile-off"><?= $model->specialization ?></h3>
        <div class="d-flex align-items-center flex-wrap mb8">
            <span class="mr16 paragraph"><?= $model->salary ?> ₽ </span>
            <span class="mr16 paragraph"><?= $model->experience ?></span>
            <span class="mr16 paragraph"><?= $model->birthDate ?></span>
            <span class="mr16 paragraph"><?= $model->city ?></span>
        </div>
        <p class="paragraph tbold mobile-off">Последнее место работы</p>
    </div>
    <div class="company-list-search__block-middle">
        <p class="paragraph mb16 mobile-mb32"><?= $model->lastWork ?></p>
    </div>
</div>