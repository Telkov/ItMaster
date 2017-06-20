<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>

<?php
//debug($model);
?>

<div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 container mail-form">
	<form action="" method="post" class="form-horizontal">
		
		<div class="form-group mail-form__row">
			<div class="col-lg-2 col-md-3 col-sm-3 col-xs-3 mail-form__label">
				<label for="recipient" class="control-label">Получатель</label>
			</div>
			<div class="col-lg-7 col-md-7 col-sm-7 col-xs-7 mail-form__input-size">
				<input type="text" class="form-control" name="recipient" placeholder="Введите Email получателя">	
			</div>
			<div class="col-lg-3 col-md-2 col-sm-2 col-xs-2">
			</div>	
		</div>
		
		<div class="form-group mail-form__row">
			<div class="col-lg-2 col-md-3 col-sm-3 col-xs-3 mail-form__label">
				<label for="subject" class="control-label">Тема письма</label>
			</div>
			<div class="col-lg-7 col-md-7 col-sm-7 col-xs-7 mail-form__input-size">
				<input type="text" class="form-control" name="subject" placeholder="Введите тему письма">
			</div>
			<div class="col-lg-3 col-md-2 col-sm-2 col-xs-2">
			</div>	
		</div>
		
		<div class="form-group mail-form__row">
			<div class="col-lg-2 col-md-3 col-sm-3 col-xs-3 mail-form__label">
				<label for="message" class="control-label">Текст письма</label>
			</div>
			<div class="col-lg-7 col-md-7 col-sm-7 col-xs-7 mail-form__input-size">
				<textarea id="textfield" cols="30" rows="10" class="form-control" name="message" placeholder="Введите текст письма"></textarea> 
			</div>
			<div class="col-lg-3 col-md-2 col-sm-2 col-xs-2">
			</div>	
		</div>
		
		<div class="mail-form__row">
			<div class="col-lg-2 col-md-3 col-sm-3 col-xs-3 mail-form__label">
			</div>
			<div class="col-lg-7 col-md-7 col-sm-7 col-xs-7 mail-form__input-size">
				<input type="submit" name="send" class="btn btn-success" value="Отправить">
				<input type="submit" name="cancel" class="btn btn-danger" value="Отмена">
			</div>
			<div class="col-lg-3 col-md-2 col-sm-2 col-xs-2">
			</div>
		</div>

	</form>
</div>