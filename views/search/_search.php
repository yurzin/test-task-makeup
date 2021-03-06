<?php

/* @var $model */
/* @var $viewModel */

?>

<div onclick="location.href='/view-resume/<?= $model->id ?>'"
     class=" vakancy-page-block company-list-search__block resume-list__block p-rel mb16"
     style="cursor: pointer">
    <div class="company-list-search__block-left">
        <div class="resume-list__block-img mb8">
            <img src="<?= $model->photo ?>" alt="">
        </div>
    </div>
    <div class="company-list-search__block-right">
        <div class="mini-paragraph cadet-blue mobile-mb12">Обновлено <?= $model->date ?></div>
        <h3 class="mini-title mobile-off"><?= $model->specialization->name ?></h3>
        <div class="d-flex align-items-center flex-wrap mb8">
            <span class="mr16 paragraph"><?= $model->salary ?> ₽ </span>
            <span class="mr16 paragraph"><?= $model->experience == 1 ? 'Нет опыта работы' : 'Опыт работы ' . Yii::$app->i18n->format(
                        '{n, plural, one{# год} few{# года} many{# лет} other{# года}}',
                        ['n' => $viewModel->getWorkExperience($model->organization)],
                        'ru_RU'
                    ) ?></span>
            <span class="mr16 paragraph">Возраст <?= Yii::$app->i18n->format(
                    '{n, plural, one{# год} few{# года} many{# лет} other{# года}}',
                    ['n' => $viewModel->getAge($model->birth_date)],
                    'ru_RU'
                ); ?></span>
            <span class="mr16 paragraph"><?= $model->city->name ?></span>
        </div>
        <p class="paragraph tbold mobile-off">Последнее место работы</p>
    </div>
    <div class="company-list-search__block-middle">
        <p class="paragraph mb16 mobile-mb32"><?= $model->organization->name != '' ? $model->organization->name : 'Тунеядец' ?></p>
    </div>
</div>