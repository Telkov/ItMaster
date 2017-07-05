<?php
//второй слой, для контроллера mail
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\components\FormWidget;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
use app\components\CountInboxWidget;
use app\components\CountSentWidget;

$inboxurl = Url::toRoute(['mail/inbox']);
$senturl = Url::toRoute(['mail/sent']);
?>

<?php
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?= Html::csrfMetaTags() ?>

    <title><?= Html::encode($this->title) ?></title>

    <?php $this->head() ?>

</head>
<body>

<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'My Company',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'My CV', 'url' => ['/site/cv']],
            ['label' => 'Home', 'url' => ['/site/index']],
            Yii::$app->user->isGuest ? (
                ['label' => 'Login', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container" style="width: 100%;">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>

        <div class="row">
            <?php
            $msg = ActiveForm::begin([

                'id' => 'delmsg-form',
                'options' => ['class' => 'form-horizontal',  'name' => 'delform', 'method' => 'get'],
            ]);
            ?>

            <div class="form-group buttons-block">
                <?php
                echo Html::button('Написать письмо',
                    [
                        'class' => 'btn btn-success',
                        'id' =>'new-msg-button',
                        'data-toggle' => 'modal',
                        'data-target' => '#myModal',
                    ]);
                echo Html::submitButton('Удалить выбранные',
                    [
                        'class' => 'btn btn-danger',
                        'id'=> 'delete-msg-button',
                    ]);
                echo ' <div class="col-lg-3 col-md-4 col-sm-5 col-xs-7 search-form">
                            <input type="text" id="filter"  value="" class="form-control search-field" placeholder="Введите email или дату">
                            </div>';
                ?>
            </div>

        </div>
        <div class="row">
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                <div class="mail-sidebar">
                    <div class="mail-sidebar__tab">
                        <p>Почта</p>
                    </div>
                    <div class="mail-sidebar__menu">
                        <div class="mail-sidebar__menu_table">
                            <table cellspacing="0">
                                <tr>
                                    <td><a href= <?= $inboxurl; ?> >Входящие</a></td><td><a href= <?= $inboxurl; ?> ><?= CountInboxWidget::widget(); ?></a></td>
                                </tr>
                                <tr>
                                    <td><a href= <?= $senturl; ?>>Отправленные</a></td><td><a href= <?= $senturl; ?> ><?= CountSentWidget::widget(); ?></a></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 msgs-table">

                <?= $content ?>

            </div>

                <?php ActiveForm::end(); ?>

        </div>
    </div>

    <?= FormWidget::widget([]) ?>

<footer class="footer" style="margin-top:">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>
        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

</div> <!--  class wrap close  -->

<?php $this->endBody() ?>

</body>
</html>

<?php $this->endPage() ?>
