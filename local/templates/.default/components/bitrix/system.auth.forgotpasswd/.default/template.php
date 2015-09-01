<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?if($arParams["AUTH_RESULT"]['TYPE']=="OK"):?>
	<div class="alert alert-success" role="alert">
		Контрольная строка, а также ваши регистрационные данные были высланы на электронную почту. Пожалуйста, дождитесь прихода письма, так как контрольная строка изменяется при каждом запросе.
	</div>
	<br>
	<?return;?>
<?elseif($arParams["AUTH_RESULT"]['TYPE']=="ERROR"):?>
	<div class="alert alert-danger" role="alert">
		<?=$arParams["~AUTH_RESULT"]['MESSAGE']?>
	</div>	
	<br>
<?endif?>

<form role="form" name="bform" method="post" target="_top" action="<?=$arResult["AUTH_URL"]?>">
	<?if(strlen($arResult["BACKURL"]) > 0):?>
		<input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>" />
	<?endif?>
	<input type="hidden" name="AUTH_FORM" value="Y">
	<input type="hidden" name="TYPE" value="SEND_PWD">
	<p>
	<?=GetMessage("AUTH_FORGOT_PASSWORD_1")?>
	</p>
	<div class="row">
		<div class="form-group col-md-4">
			<label><?=GetMessage("AUTH_LOGIN")?></label>
			<input type="text" class="form-control" name="USER_LOGIN" value="<?=$arResult["LAST_LOGIN"]?>" >
		</div>
	</div>
	<p>
		<?=GetMessage("AUTH_OR")?>
	</p>
	<div class="row">
		<div class="form-group col-md-4">
			<label><?=GetMessage("AUTH_EMAIL")?></label>
			<input type="email" class="form-control" name="USER_EMAIL">
		</div>
	</div>
	<input class="btn btn-success" type="submit" name="send_account_info" value="<?=GetMessage("AUTH_SEND")?>" />
</form>
