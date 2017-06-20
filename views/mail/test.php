<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>
    <h1>Test Action</h1>
<?php
//debug($model);
?>

<?php
        $form = ActiveForm::begin([
        'options' => ['class' => 'form-horizontal'
        ]])
?>
<?= $form->field($model, 'email')->input('email', ['placeholder' => 'Введите email получателя', 'class' => 'form-control']); ?>
<?= $form->field($model, 'subject')->input('string',['placeholder' => 'Введите тему письма']); ?>
<?= $form->field($model, 'message')->textarea(['rows' => 5, 'placeholder' => 'Введите текст сообщения']); ?>

<div class="form-group">
    <div>
        <?= Html::submitButton('Отправить', ['class' => 'btn btn-success']) ?>
        <?= Html::submitButton('Отмена', ['class' => 'btn btn-danger']) ?>

</div>
</div>




<?php ActiveForm::end() ?>

