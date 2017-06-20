<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>
    <h1>Test Action</h1>
<?php
//debug($model);
?>

<?php $form = ActiveForm::begin() ?>
<?= $form->field($model, 'email')->input('email', ['placeholder' => 'Введите email получателя']); ?>
<?= $form->field($model, 'subject')->input('string',['placeholder' => 'Введите тему письма']); ?>
<?= $form->field($model, 'message')->textarea(['rows' => 5, 'placeholder' => 'Введите текст сообщения']); ?>
<?= Html::submitButton('Отправить', ['class' => 'btn btn-success']) ?>
<?= Html::submitButton('Отмена', ['class' => 'btn btn-danger']) ?>
<?php ActiveForm::end() ?>

