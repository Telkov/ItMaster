<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

$inboxurl = Url::toRoute(['mail/inbox']);
$senturl = Url::toRoute(['mail/sent']);
?>

<?php if (Yii::$app->session->hasFlash('contactFormSubmitted')) { ?>

    <?php
    $this->registerJs(
        "$('#myModalSendOk').modal('show');",
        yii\web\View::POS_READY
    );
    ?>

    <!-- Modal -->
    <div class="modal fade" id="myModalSendOk" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" align="center">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h5 class="modal-title" id="myModalLabel">Отчет об отправке</h5>
                </div>
                <div class="modal-body">
                    <p>Ваше сообщение отправлено успешно!</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

<?php } ?>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <?php
            $mform = ActiveForm::begin([
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
            <div class="container-fluid">
                <div class="modal-header" align="center">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h5 class="modal-title" id="myModalLabel">Новое сообщение</h5>
                </div>
                <div class="modal-body">

                    <?= $mform->field($mail, 'recipient')->input('email', ['placeholder' => 'Введите email получателя']); ?>
                    <?= $mform->field($mail, 'subject')->input('string',['placeholder' => 'Введите тему письма']); ?>
                    <?= $mform->field($mail, 'message')->textarea(['rows' => 10, 'placeholder' => 'Введите текст сообщения']); ?>

                </div>
                <div class="modal-footer">
                    <div class="form-group" align="right">
                        <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>

