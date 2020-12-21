<?php
/* @var $model */

use yii\helpers\Html;
use \yii\widgets\ActiveForm;
use yii\widgets\MaskedInput;

?>

<?php if (Yii::$app->session->hasFlash('success')): ?>
    <?php if (Yii::$app->session->getFlash('success')): ?>
        <p>Данные формы записаны в базу данных</p>
    <?php else: ?>
        <p>Данные формы не прошли валидацию</p>
    <?php endif; ?>
<?php endif; ?>
<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-12">
                    <div class="form-group m-2 form-control-lg">
                        <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
                        <?= $form->field($model, 'imageFile')->fileInput(['class' => 'sr-only'])->label('Выберите фото', ['class' => 'btn btn-primary']) ?>
                        <?= $form->field($model, 'photo')->textInput()->label(false); ?>
                        <?= $form->field($model, 'last_name')->textInput(['class' => 'form-control-lg']); ?>
                        <?= $form->field($model, 'name')->textInput(['class' => 'form-control-lg']); ?>
                        <?= $form->field($model, 'patronymic')->textInput(['class' => 'form-control-lg']); ?>
                        <?= $form->field($model, 'age')->textInput(['class' => 'form-control-lg']); ?>
                        <?= $form->field($model, 'gender')->textInput(['class' => 'form-control-lg']); ?>
                        <?= $form->field($model, 'date_birth')->textInput(['type' => 'date', 'class' => 'form-control-lg']); ?>
                        <?= $form->field($model, 'city')->textInput(['class' => 'form-control-lg']); ?>
                        <?= $form->field($model, 'phone')->widget(MaskedInput::className(), ['mask' => '9-999-999-9999',
                            'options' => ['class' => 'form-control-lg', 'id' => 'phone', 'placeholder' => ('Контактный телефон')]]); ?>
                        <?= $form->field($model, 'email')->input('email', ['class' => 'form-control-lg']); ?>
                        <?= $form->field($model, 'specialization')->textInput(['class' => 'form-control-lg']); ?>
                        <?= $form->field($model, 'experience')->textInput(['class' => 'form-control-lg']); ?>
                        <?= $form->field($model, 'salary')->textInput(['class' => 'form-control-lg']); ?>
                        <?= $form->field($model, 'last_work')->textInput(['class' => 'form-control-lg']); ?>
                        <?= Html::submitButton('Добавить резюме', ['class' => 'link-orange-btn orange-btn my-vacancies-add-btn']) ?>
                        <?php ActiveForm::end(); ?>
                    </div>
            </div>
        </div>
    </div>
</div>
