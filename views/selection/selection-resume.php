<?php

/* @var $this yii\web\View */

use yii\widgets\ListView;

/* @var $dataProvider */

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
<div class="row">
    <div class="col-lg-9 desctop-992-pr-16">
        <div class="d-flex align-items-center flex-wrap mb8">
            <span class="paragraph mr16">Найдено <?= $totalCount ?> резюме</span>
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
                ]
            ]
        );
        ?>
    </div>
</div>
