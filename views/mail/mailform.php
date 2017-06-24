<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>

<div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
    <?php 
    if(Yii::$app->session->hasFlash('succes')): 
    ?>
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
         <?= Yii::$app->session->getFlash('succes'); ?>
    </div>
    <?php endif; ?>

    <?php 
    if(Yii::$app->session->hasFlash('error')): 
    ?>
     <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <?= Yii::$app->session->getFlash('error'); ?>
    </div>
    <?php endif; ?>

    <?php
//debug($mail);
    $mailform = ActiveForm::begin([
        'id' => 'mail-form',
        'options' => ['class' => 'form-horizontal'],
        'fieldConfig' => [
            'template' => '<div class="form-group">
                                {label}
                                <div class="col-lg-10 col-md-9 col-sm-9 col-xs-9">
                                    {input}
                                </div>
                                <div class="col-lg-10 col-md-9 col-sm-9 col-xs-9">
                                    {error}
                                </div>
                            </div>',
            'labelOptions' => ['class' => 'col-lg-2 col-md-3 col-sm-3 col-xs-3 control-label'],
        ],
    ]);
    ?>
    <?= $mailform->field($mail, 'recipient')->input('email', ['placeholder' => 'Введите email получателя']); ?>
    <?= $mailform->field($mail, 'subject')->input('string',['placeholder' => 'Введите тему письма']); ?>
    <?= $mailform->field($mail, 'message')->textarea(['rows' => 7, 'placeholder' => 'Введите текст сообщения']); ?>
    <div class="form-group" align="right">
        <div>
            <?= Html::submitButton('Отправить', ['class' => 'btn btn-success']) ?>
        </div>
    </div>

    <?php ActiveForm::end() ?>
</div>
