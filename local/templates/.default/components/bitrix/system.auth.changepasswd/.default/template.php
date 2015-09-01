<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if($arParams["AUTH_RESULT"]['TYPE']=="OK"):?>
	<div class="alert alert-success" role="alert">
		Пароль успешно сменен.
	</div>
	<br>
	<a class="btn btn-default" href="<?=$arResult["AUTH_AUTH_URL"]?>"><?=GetMessage("AUTH_AUTH")?></a>
<?else:?>
	<?if($arParams["AUTH_RESULT"]['TYPE']=="ERROR"):?>
		
	
	<div class="alert alert-danger" role="alert">
		<?=$arParams["~AUTH_RESULT"]['MESSAGE']?>
	</div>	
	<br>
	<?endif?>
	<form role="form" method="post" action="<?=$arResult["AUTH_FORM"]?>" name="bform" class="form-horizontal">
		<?if (strlen($arResult["BACKURL"]) > 0): ?>
		<input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>" />
		<? endif ?>
		<input type="hidden" name="AUTH_FORM" value="Y">
		<input type="hidden" name="TYPE" value="CHANGE_PWD">
		<div class="form-group">
			<label class="col-sm-2 control-label"><span class="text-danger">*</span>Логин</label>
			<div class="col-sm-3">
				<input type="text" name="USER_LOGIN" class="form-control"  placeholder="<?=GetMessage("AUTH_LOGIN")?>" value="<?=$arResult["LAST_LOGIN"]?>">
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label"><span class="text-danger">*</span>Контрольная строка</label>
			<div class="col-sm-3">
				<input type="text" name="USER_CHECKWORD" class="form-control"  placeholder="<?=GetMessage("AUTH_CHECKWORD")?>" value="<?=$arResult["USER_CHECKWORD"]?>">
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label"><span class="text-danger">*</span>Новый пароль</label>
			<div class="col-sm-3">
				<input type="password" name="USER_PASSWORD" class="form-control" >
				<p class="f-XS f-light"><?=$arResult["GROUP_POLICY"]["PASSWORD_REQUIREMENTS"];?></p>
			</div>

		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label"><span class="text-danger">*</span>Подтверждение пароля</label>
			<div class="col-sm-3">
				<input type="password" name="USER_CONFIRM_PASSWORD" class="form-control"  placeholder="" >
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<input class="btn btn-success" type="submit" name="change_pwd" value="<?=GetMessage("AUTH_CHANGE")?>" />
			</div>
		</div>
	</form>
<?endif?>
<?/*
<hr>


<p><span class="text-danger">*</span><?=GetMessage("AUTH_REQ")?></p>
<p>
	<a class="btn btn-default" href="<?=$arResult["AUTH_AUTH_URL"]?>"><?=GetMessage("AUTH_AUTH")?></a>
</p>
*/?>