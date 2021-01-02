<?php

/* @var $this yii\web\View */

use yii\widgets\ListView;

/* @var $dataProvider */

$this->title = 'Список найденых резюме';
?>
<div class="row">
    <div class="col-lg-9 desctop-992-pr-16">
    <div class="d-flex align-items-center flex-wrap mb8">
        <span class="paragraph mr16">Найдено <?php  ?> резюме</span>
    </div>
    <?php
    echo ListView::widget(
        [
            'dataProvider' => $dataProvider,
            'options' => [
                'tag' => false,
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
            ],
        ]
    );
    ?>
    </div>
</div>
