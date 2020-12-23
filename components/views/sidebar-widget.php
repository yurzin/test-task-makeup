<?php
/* @var $this yii\web\View */
/* @var $city */
/* @var $salary */
/* @var $specialization */

use app\models\Filter;
use app\components\MenuFilter;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$model = new Filter();
?>


    <div class="signin-modal__switch-btns-wrap resume-list__switch-btns-wrap mb16">
        <?php echo MenuFilter::widget(
            ['items' =>
                [
                    ['label' => 'Все', 'url' => Url::toRoute('/'), 'options' => ['tag' => false]],
                    ['label' => 'Мужчины', 'url' => Url::toRoute([Url::current(['filter' => null, 'filter', 'gender' => 'male'])]), 'options' => ['tag' => false]],
                    ['label' => 'Женщины', 'url' => Url::toRoute([Url::current(['filter' => null, 'filter', 'gender' => 'female'])]), 'options' => ['tag' => false]]
                ], 'options' => ['tag' => 'div', 'class' => 'signin-modal__switch-btns-wrap resume-list__switch-btns-wrap mb16']
            ],
        );
        ?>
    </div>

    <div class="vakancy-page-filter-block__row mb1">
        <div class="paragraph cadet-blue">Город</div>
        <div class="citizenship-select">
            <?php $form = ActiveForm::begin(['action' => 'filter', 'method' => 'get']); ?>
            <?= $form->field($model, 'city', ['options' => ['tag' => false]])->dropDownList($city,
                ['prompt' => 'Выберите город', 'label' => false, 'class' => 'nselect-1', '0' => ['Selected' => true], ['data-val' => 'label']
                ])->label(false); ?>
        </div>
    </div>
    <div class="vakancy-page-filter-block__row mb1">
        <div class="paragraph cadet-blue">Зарплата</div>
        <div class="citizenship-select">
            <?= $form->field($model, 'salary', ['options' => ['tag' => false]])->textInput(['value' => $salary, 'class' => 'dor-input w100'])->label(false); ?>
        </div>
    </div>
    <div class="vakancy-page-filter-block__row mb1">
        <div class="paragraph cadet-blue">Специализация</div>
        <div class="citizenship-select">
            <?= $form->field($model, 'specialization')->dropDownList($specialization,
                ['prompt' => 'Выберите специализацию', 'label' => false,
                    /*'class' => 'nselect-1',*/ '0' => ['Selected' => true], ['data-val' => 'label']
                ])->label(false);
            ?>
        </div>
    </div>
    <div class="vakancy-page-filter-block__row mb1">
        <div class="paragraph cadet-blue">Возраст</div>
        <div class="d-flex">
            <?= $form->field($model, 'age_from', ['options' => ['tag' => false]])->textInput(['class' => 'dor-input w100', 'placeholder' => 'От'])->label(false); ?>
            <?= $form->field($model, 'age_to', ['errorOptions' => ['tag' => false]])->textInput(['class' => 'dor-input w100', 'placeholder' => 'До'])->label(false); ?>
        </div>
    </div>
    <div class="vakancy-page-filter-block__row mb1">
        <div class="paragraph cadet-blue">Опыт работы</div>
        <div class="profile-info">
            <div class="form-check d-flex">
                <?= $form->field($model, 'experience', ['options' => ['tag' => false]])
                    ->checkboxList(['Без опыта', 'От 1 года до 3 лет', 'От 3 лет до 6 лет', 'Более 6 лет'],
                        ['item' => function ($index, $label, $name, $checked, $value) {
                            $checkedLabel = $checked ? 'checked' : '';
                            $inputId = str_replace(['[', ']'], ['', ''], 'exampleCheck') . intval($index + 1);
                            return "<div class='form-check d-flex'><input type='checkbox' class='form-check-input' name=$name value=$value id=$inputId $checkedLabel>"
                                . "<label class='form-check-label' for=$inputId></label>" . "<label class='profile-info__check-text' for=$inputId>$label</label></div>";
                        }, ['class' => 'profile-info']])
                    ->label(false); ?>
            </div>
        </div>
    </div>
    <div class="vakancy-page-filter-block__row mb1">
        <div class="paragraph cadet-blue">Тип занятости</div>
        <div class="profile-info">
            <div class="form-check d-flex">
                <?= $form->field($model, 'employment_type', ['options' => ['tag' => false]])
                    ->checkboxList(['Полная занятость', 'Частичная занятость', 'Проектная работа', 'Стажировка', 'Волонтёрство'],
                        ['item' => function ($index, $label, $name, $checked, $value) {
                            $checkedLabel = $checked ? 'checked' : '';
                            $inputId = str_replace(['[', ']'], ['', ''], 'exampleCheck') . intval($index + 5);
                            return "<div class='form-check d-flex'><input type='checkbox' class='form-check-input' name=$name value=$value id=$inputId $checkedLabel>"
                                . "<label class='form-check-label' for=$inputId></label>" . "<label class='profile-info__check-text' for=$inputId>$label</label></div>";
                        }, ['class' => 'profile-info']])
                    ->label(false); ?>
            </div>
        </div>
    </div>
    <div class="vakancy-page-filter-block__row mb1">
        <div class="paragraph cadet-blue">График работы</div>
        <div class="profile-info">
            <?= $form->field($model, 'schedule', ['options' => ['tag' => false]])
                ->checkboxList(['Полный день', 'Сменный график', 'Вахтовый метод', 'Гибкий график', 'Удалённая работа'], [
                    'item' => function ($index, $label, $name, $checked, $value) {
                        $checkedLabel = $checked ? 'checked' : '';
                        $inputId = str_replace(['[', ']'], ['', ''], 'exampleCheck') . intval($index + 10);
                        return "<div class='form-check d-flex'><input type='checkbox' class='form-check-input' name=$name value=$value id=$inputId $checkedLabel>"
                            . "<label class='form-check-label' for=$inputId></label>" . "<label class='profile-info__check-text' for=$inputId>$label</label></div>";
                    }, ['class' => 'profile-info']])->label(false); ?>
        </div>
    </div>

    <div class="vakancy-page-filter-block__row vakancy-page-filter-block__show-vakancy-btns mb24 d-flex flex-wrap align-items-center mobile-jus-cont-center">
        <?= Html::submitButton('Показать вакансии', ['class' => 'link-orange-btn orange-btn mr24 mobile-mb12', 'id' => 'my-button-handler' ]) ?>
    </div>
    </div>
<?php ActiveForm::end(); ?>

<?php
/*$script = "$('#w0').submit(function(e){
var emptyinputs = $(this).find('input').filter(function(){
return !$.trim(this.value).length; 
}).prop('disabled',true);
    });";
$this->registerJs($script, View::POS_READY, 'my-button-handler');*/

/*$this->registerJs(
    "$('#w1').submit(function(e){
    var emptyinputs = $(this).find('input').filter(function(){
        return !$.trim(this.value).length;
    }).prop('disabled',true);    
});"

    View::POS_READY,
    'my-button-handler'
);*/

?>