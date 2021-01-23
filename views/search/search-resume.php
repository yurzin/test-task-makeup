<?php

/* @var $this yii\web\View */

use yii\widgets\ListView;

/* @var $dataProvider */
/* @var $viewModel */

$this->title = 'Список найденых резюме';

$totalCount = $dataProvider->getTotalCount();

?>
<div class="row">
    <div class="col-lg-9 desctop-992-pr-16">
        <div class="d-flex align-items-center flex-wrap mb8">
            <span class="paragraph mr16">Найдено <?= $totalCount ?> резюме</span>
        </div>
        <?php
        echo ListView::widget(
            [
                'dataProvider' => $dataProvider,
                'viewParams'=>['viewModel' => $viewModel],
                'options' => [
                    'tag' => false
                ],
                'layout' => "{items}\n{pager}",
                'itemView' => '_search',
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
</div>