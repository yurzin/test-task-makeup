<?php
/* @var $this yii\web\View */
/* @var $data */

$this->title = 'Резюме ' . $data->name;

?>

<div class="main-wrapper">

    <div class="content p-rel">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="mt8 mb32"><a href="<?= Yii::$app->urlManager->createUrl('site/index') ?>"><img src="/images/blue-left-arrow.svg" alt="arrow"> Резюме в
                            Кемерово</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-5 mobile-mb32">
                    <div class="profile-foto resume-profile-foto"><img src="<?= $data->photo ?>" alt="profile-foto">
                    </div>
                </div>
                <div class="col-lg-8 col-md-7">
                    <div class="main-title d-md-flex justify-content-between align-items-center mobile-mb16"><?= $data->specialization ?>
                    </div>
                    <div class="paragraph-lead mb16">
                        <span class="mr24"><?= $data->salary ?> ₽</span>
                        <span>Опыт работы <?= $data->experience ?></span>
                    </div>
                    <div class="profile-info company-profile-info resume-view__info-blick">
                        <div class="profile-info__block company-profile-info__block mb8">
                            <div class="profile-info__block-left company-profile-info__block-left">Имя
                            </div>
                            <div class="profile-info__block-right company-profile-info__block-right">
                                <?php
                                echo $data->name ." ". $data->last_name ." ". $data->patronymic
                                ?>
                            </div>
                        </div>
                        <div class="profile-info__block company-profile-info__block mb8">
                            <div class="profile-info__block-left company-profile-info__block-left">Возраст
                            </div>
                            <div class="profile-info__block-right company-profile-info__block-right"><?= $data->age ?>
                                года
                            </div>
                        </div>
                        <div class="profile-info__block company-profile-info__block mb8">
                            <div class="profile-info__block-left company-profile-info__block-left">Занятость</div>
                            <div class="profile-info__block-right company-profile-info__block-right">Полная</div>
                        </div>
                        <div class="profile-info__block company-profile-info__block mb8">
                            <div class="profile-info__block-left company-profile-info__block-left">График работы
                            </div>
                            <div class="profile-info__block-right company-profile-info__block-right">Гибкий график,
                                полный день
                            </div>
                        </div>
                        <div class="profile-info__block company-profile-info__block mb8">
                            <div class="profile-info__block-left company-profile-info__block-left">Город проживания
                            </div>
                            <div class="profile-info__block-right company-profile-info__block-right"><?= $data->city ?></div>
                        </div>
                        <div class="profile-info__block company-profile-info__block mb8">
                            <div class="profile-info__block-left company-profile-info__block-left">
                                Электронная почта
                            </div>
                            <div class="profile-info__block-right company-profile-info__block-right"><a
                                        href="#">test@example.com</a></div>
                        </div>
                        <div class="profile-info__block company-profile-info__block mb8">
                            <div class="profile-info__block-left company-profile-info__block-left">
                                Телефон
                            </div>
                            <div class="profile-info__block-right company-profile-info__block-right"><a
                                        href="#">+7 123 456 78 90</a>
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
                                        <div class="col-lg-12"><h3 class="heading mb16">Опыт работы 13 лет и 11
                                                месяцев</h3></div>
                                        <div class="col-md-4 mb16">
                                            <div class="paragraph tbold mb8">Апрель 2013 — по настоящее время</div>
                                            <div class="mini-paragraph">7 лет 1 месяц</div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="paragraph tbold mb8">Программные системы Атлансис</div>
                                            <div class="paragraph tbold mb8">Директор по стратегическому развитию
                                            </div>
                                            <div class="paragraph">Lorem ipsum dolor sit amet, consectetur
                                                adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida
                                                dolor sit amet lacus accumsan et viverra justo commodo. Proin
                                                sodales pulvinar tempor. Cum sociis natoque penatibus et magnis dis
                                                parturient montes, nascetur ridiculus mus. Nam fermentum, nulla
                                                luctus pharetra vulputate, felis tellus mollis orci, sed rhoncus
                                                sapien nunc eget.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb16">
                                        <div class="col-md-4 mb16">
                                            <div class="paragraph tbold mb8">Май 2006 — по Март 2013</div>
                                            <div class="mini-paragraph">6 лет 10 месяцев</div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="paragraph tbold mb8">Программные системы Атлансис</div>
                                            <div class="paragraph tbold mb8">Директор по стратегическому развитию
                                            </div>
                                            <div class="paragraph">Lorem ipsum dolor sit amet, consectetur
                                                adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida
                                                dolor sit amet lacus accumsan et viverra justo commodo. Proin
                                                sodales pulvinar tempor. Cum sociis natoque penatibus et magnis dis
                                                parturient montes, nascetur ridiculus mus. Nam fermentum, nulla
                                                luctus pharetra vulputate, felis tellus mollis orci, sed rhoncus
                                                sapien nunc eget.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="company-profile-text mb64">
                                        <h3 class="heading mb16">Обо мне</h3>
                                        <p>С 2004 года работал в структурах АФК “Система”, в том числе и в качестве
                                            основателя и руководителя компании “СИСТЕМА-ИНФОРМ“. За год работы вывел
                                            ее в ТОП 100 ИТ компаний России. Отвечал за создание и развитие ИТ и
                                            других бизнес-проектов, включая проекты по информационной безопасности
                                            группы компаний АФК “Система”. <br><br> В 2005 году с командой
                                            талантливых специалистов из города Твери создал компанию “Network
                                            Systems Innovations“, которая разработала первую в России встраиваемую
                                            операционную систему “PyrOS” для аппаратных Firewall и систем IDS/IPS
                                            (системы обнаружения и предотвращения вторжений). Разработка была высоко
                                            оценена специалистами отечественных и зарубежных компаний на
                                            международной выставке CeBIT в Ганновере. <br><br> В 2006 году принял
                                            участие в реорганизации и реинжиниренге бизнес-процессов компании
                                            “РЕНОВА-СЕРВИС“. <br><br> В 2009 году создал и возглавлял
                                            бизнес-направление “Ситроникс Системы Безопасности” в компании
                                            “Sitronics”. Курировал реализацию различных проектов по ИТ и
                                            информационной безопасности (ИБ) в дочерних структурах АФК “Система”
                                            (ПАО “МТС”, ПАО “Башнефть”, ПАО “МГТС”, “Комстар-ОТС”, “МТУ-Интел” и
                                            др.) <br><br> С 2012 года занялся созданием и развитием собственных
                                            бизнес-проектов в области новых информационных технологий и
                                            информационной безопасности. <br><br> Многие из решений и продуктов,
                                            разработанных на базе запатентованных мною идей, используются тысячами
                                            компаниями в России. Некоторые бизнес идеи и венчурные проекты ушли в
                                            небытие, но есть и те, которые стали неотъемлемой частью больших
                                            корпораций и предприятий. <br> <br> С 2018 года Член Совета ТПП РФ по
                                            развитию информационных технологий и цифровой экономики. <br> <br>
                                            Участник
                                            Всероссийского конкурса “Лидеры России 2018-2020“. <br> <br> Участник и
                                            спикер TEDx ForestersPark 2019. Видео на YouTube. <br> <br> Участник и
                                            спикер
                                            благотворительной ИТ-конференции CISummIT 2019 «Digital Hearts» и Фонда
                                            Константина Хабенского. <br> <br> Автор книги “Цифровая трансформация“.
                                            <br>
                                            <br> На сегодняшний день, сфера моих интересов лежит в области
                                            формирования новых уникальных бизнес-проектов в таких областях как:
                                            «Цифровое бессмертие», «Робототехника», «Искусственный Интеллект»,
                                            «Цифровая экономика», «Интернет вещей», «Блокчейн», «Кибербезопасность»
                                            и другие.</p>
                                        показываются на страницах результатов поиска контекстно заданному поисковому
                                        запросу. Небольшую
                                        часть дохода Яндекс получает от медийной рекламы. Яндексу принадлежит
                                        крупнейшая в России
                                        система автоматического размещения рекламы Яндекс.Директ.</p>
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
