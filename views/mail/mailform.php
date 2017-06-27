<?php
use yii\bootstrap\Modal;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>
<!-- <div class="modal" id="myModal">
<div class="modla-body"></div> -->
<?php
Modal::begin([
    'id' => 'myModal',
    'header' => '<p style="text-align: center">Новое сообщение</p>',
    'size' => 'modal-lg',
    'toggleButton' => [
    'label' => 'Написать письмо',
    'tag' => 'button',
    'class' => 'btn btn-success',
    ],
]);
?>
<div class="container-fluid modal-form">
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
                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                                    {input}
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                                    {error}
                                </div>
                            </div>',
            'labelOptions' => ['class' => 'col-lg-3 col-md-3 col-sm-3 col-xs-3 control-label'],
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
<?php Modal::end()?>

<!-- </div> -->

<!-- Modal -->
<!-- <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                 <h4 class="modal-title">Modal title</h4>

            </div>
            <div class="modal-body"><div class="te"></div></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
        /.modal-content
    </div>
    /.modal-dialog
</div> -->
<!-- /.modal -->