<?php
/* @var $this yii\web\View */

/* @var $viewModel */

$item = $viewModel->resume;

$this->title = 'Резюме ' . $item->last_name;

?>

<div class="main-wrapper">
    <div class="content p-rel">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="mt8 mb32"><a href="<?= Yii::$app->urlManager->createUrl('site/index') ?>">
                            <img src="/images/blue-left-arrow.svg" alt="arrow"> Резюме в Кемерово</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-5 mobile-mb32">
                    <div class="profile-foto resume-profile-foto"><img src="<?= $item->photo ?>" alt="profile-foto">
                    </div>
                </div>
                <div class="col-lg-8 col-md-7">
                    <div class="main-title d-md-flex justify-content-between align-items-center mobile-mb16"><?= $item->specialization->name ?>
                    </div>
                    <div class="paragraph-lead mb16">
                        <span class="mr24"><?= $item->salary ?> ₽</span>
                        <span> <?= $item->experience == 1 ? 'Нет опыта работы' : 'Опыт работы ' . Yii::$app->i18n->format(
                                    '{n, plural, one{# год} few{# года} many{# лет} other{# года}}',
                                    ['n' => $viewModel->getExperience()],
                                    'ru_RU'
                                ) ?> </span>
                    </div>
                    <div class="profile-info company-profile-info resume-view__info-blick">
                        <div class="profile-info__block company-profile-info__block mb8">
                            <div class="profile-info__block-left company-profile-info__block-left">Имя
                            </div>
                            <div class="profile-info__block-right company-profile-info__block-right">
                                <?php
                                echo $item->last_name . " " . $item->name . " " . $item->patronymic
                                ?>
                            </div>
                        </div>
                        <div class="profile-info__block company-profile-info__block mb8">
                            <div class="profile-info__block-left company-profile-info__block-left">Возраст
                            </div>
                            <div class="profile-info__block-right company-profile-info__block-right">
                                <?= Yii::$app->i18n->format(
                                    '{n, plural, one{# год} few{# года} many{# лет} other{# года}}',
                                    ['n' => $viewModel->getAge()],
                                    'ru_RU'
                                ); ?>
                            </div>
                        </div>
                        <div class="profile-info__block company-profile-info__block mb8">
                            <div class="profile-info__block-left company-profile-info__block-left">Занятость</div>
                            <div class="profile-info__block-right company-profile-info__block-right">
                                <?= $viewModel->getEmploymentName(); ?></div>
                        </div>
                        <div class="profile-info__block company-profile-info__block mb8">
                            <div class="profile-info__block-left company-profile-info__block-left">График работы
                            </div>
                            <div class="profile-info__block-right company-profile-info__block-right">
                                <?= $viewModel->getScheduleName(); ?>
                            </div>
                        </div>
                        <div class="profile-info__block company-profile-info__block mb8">
                            <div class="profile-info__block-left company-profile-info__block-left">Город проживания
                            </div>
                            <div class="profile-info__block-right company-profile-info__block-right"><?= $item->city->name ?></div>
                        </div>
                        <div class="profile-info__block company-profile-info__block mb8">
                            <div class="profile-info__block-left company-profile-info__block-left">
                                Электронная почта
                            </div>
                            <div class="profile-info__block-right company-profile-info__block-right"><a
                                        href="#"><?= $item->email ?></a></div>
                        </div>
                        <div class="profile-info__block company-profile-info__block mb8">
                            <div class="profile-info__block-left company-profile-info__block-left">
                                Телефон
                            </div>
                            <div class="profile-info__block-right company-profile-info__block-right"><a
                                        href="#"><?= $item->phone ?></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="devide-border mb32 mt50"></div>
                    <div class="tabs mb50">
                        <div class="tabs__content active">
                            <div class="row">
                                <div class="col-lg-10">
                                    <div class="row mb16">
                                        <div class="col-lg-12"><h3
                                                    class="heading mb16"> <?= $item->experience == 1 ? 'Нет опыта работы' : 'Опыт работы ' . Yii::$app->i18n->format(
                                                        '{n, plural, one{# год} few{# года} many{# лет} other{# года}}',
                                                        ['n' => $viewModel->getExperience()],
                                                        'ru_RU'
                                                    ) ?></h3></div>
                                        <div class="col-md-4 mb16">
                                            <div class="paragraph tbold mb8"><?= $item->organization->start_month ?> <?= $item->organization->start_year ?></div>
                                            <div class="mini-paragraph"> <?= Yii::$app->i18n->format(
                                                    '{n, plural, one{# год} few{# года} many{# лет} other{# года}}',
                                                    ['n' => $viewModel->getExperience()],
                                                    'ru_RU'
                                                ) ?></div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="paragraph tbold mb8"><?= $item->organization->name ?></div>
                                            <div class="paragraph tbold mb8"><?= $item->organization->position ?>
                                            </div>
                                            <div class="paragraph"><?= $item->organization->duties ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="company-profile-text mb64">
                                        <h3 class="heading mb16">Обо мне</h3>
                                        <p><?= $item->about ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
