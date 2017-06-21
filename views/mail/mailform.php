<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>

<div class="col-lg-10">
    <?php 
    if(Yii::$app->session->hasFlash('succes')): 
    ?>
    <?= Yii::$app->session->getFlash('succes'); ?>
    <?php endif; ?>

    <?php 
    if(Yii::$app->session->hasFlash('error')): 
    ?>
    <?= Yii::$app->session->getFlash('error'); ?>
    <?php endif; ?>

    <?php
//debug($model);
    $form = ActiveForm::begin([
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
    <?= $form->field($model, 'email')->input('email', ['placeholder' => 'Введите email получателя']); ?>
    <?= $form->field($model, 'subject')->input('string',['placeholder' => 'Введите тему письма']); ?>
    <?= $form->field($model, 'message')->textarea(['rows' => 7, 'placeholder' => 'Введите текст сообщения']); ?>
    <div class="form-group" align="right">
        <div>
            <?= Html::submitButton('Отправить', ['class' => 'btn btn-success']) ?>
            <?= Html::submitButton('Отмена', ['class' => 'btn btn-danger']) ?>

        </div>
    </div>

    <?php ActiveForm::end() ?>
</div>


<!--<div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 container mail-form">-->
<!--	<form action="" method="post" class="form-horizontal">-->
<!--		-->
<!--		<div class="form-group mail-form__row">-->
<!--			<div class="col-lg-2 col-md-3 col-sm-3 col-xs-3 mail-form__label">-->
<!--				<label for="recipient" class="control-label">Получатель</label>-->
<!--			</div>-->
<!--			<div class="col-lg-7 col-md-7 col-sm-7 col-xs-7 mail-form__input-size">-->
<!--				<input type="text" class="form-control" name="recipient" placeholder="Введите Email получателя">	-->
<!--			</div>-->
<!--			<div class="col-lg-3 col-md-2 col-sm-2 col-xs-2">-->
<!--			</div>	-->
<!--		</div>-->
<!--		-->
<!--		<div class="form-group mail-form__row">-->
<!--			<div class="col-lg-2 col-md-3 col-sm-3 col-xs-3 mail-form__label">-->
<!--				<label for="subject" class="control-label">Тема письма</label>-->
<!--			</div>-->
<!--			<div class="col-lg-7 col-md-7 col-sm-7 col-xs-7 mail-form__input-size">-->
<!--				<input type="text" class="form-control" name="subject" placeholder="Введите тему письма">-->
<!--			</div>-->
<!--			<div class="col-lg-3 col-md-2 col-sm-2 col-xs-2">-->
<!--			</div>	-->
<!--		</div>-->
<!--		-->
<!--		<div class="form-group mail-form__row">-->
<!--			<div class="col-lg-2 col-md-3 col-sm-3 col-xs-3 mail-form__label">-->
<!--				<label for="message" class="control-label">Текст письма</label>-->
<!--			</div>-->
<!--			<div class="col-lg-7 col-md-7 col-sm-7 col-xs-7 mail-form__input-size">-->
<!--				<textarea id="textfield" cols="30" rows="10" class="form-control" name="message" placeholder="Введите текст письма"></textarea> -->
<!--			</div>-->
<!--			<div class="col-lg-3 col-md-2 col-sm-2 col-xs-2">-->
<!--			</div>	-->
<!--		</div>-->
<!--		-->
<!--		<div class="mail-form__row">-->
<!--			<div class="col-lg-2 col-md-3 col-sm-3 col-xs-3 mail-form__label">-->
<!--			</div>-->
<!--			<div class="col-lg-7 col-md-7 col-sm-7 col-xs-7 mail-form__input-size">-->
<!--				<input type="submit" name="send" class="btn btn-success" value="Отправить">-->
<!--				<input type="submit" name="cancel" class="btn btn-danger" value="Отмена">-->
<!--			</div>-->
<!--			<div class="col-lg-3 col-md-2 col-sm-2 col-xs-2">-->
<!--			</div>-->
<!--		</div>-->
<!---->
<!--	</form>-->
<!--</div>-->