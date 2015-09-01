<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
?>
<div class="row">
	<div class="col-md-4 col-sm-12">
		<div class="panel panel-info">
			<div class="panel-body">
				<?if ($arResult['ERROR_MESSAGE']):?>
					<div class="alert alert-danger" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<?
						ShowMessage($arParams["~AUTH_RESULT"]);
						ShowMessage($arResult['ERROR_MESSAGE']);
						?>		
					</div>
				<?endif?>
				<form>
					<input type="hidden" name="AUTH_FORM" value="Y" />
					<input type="hidden" name="TYPE" value="AUTH" />
					<?if (strlen($arResult["BACKURL"]) > 0):?>
						<input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>" />
					<?endif?>
					<?foreach ($arResult["POST"] as $key => $value):?>
						<input type="hidden" name="<?=$key?>" value="<?=$value?>" />
					<?endforeach?>

					<div class="row">
						<div class="form-group col-md-12">
							<label class="control-label">Электронная почта (логин)</label><br>
							<input required type="email" class="form-control" name="USER_LOGIN" value="<?=$arResult["LAST_LOGIN"]?>">
						</div>
						<div class="form-group col-md-12">
							<label class="control-label">Пароль</label><br>
							<input required type="password" class="form-control" id="Email" name="USER_PASSWORD" value="{{CLIENT.PASSWORD}}">
						</div>
					</div>
					<div class="clearfix"></div>
					<div class="pull-left">
						<button class="btn btn-success" id="authInOrdering">Войти</button>
					</div>
				</form>
				<div class="pull-right">
					<a class="btn btn-link" href="/personal/?forgot_password=yes">Восстановить пароль</a>
				</div>
			</div>
		</div>
	</div>
</div>

<?if($arResult["AUTH_SERVICES"]):?>
	<?	$APPLICATION->IncludeComponent("bitrix:socserv.auth.form", "",
		array(
			"AUTH_SERVICES" => $arResult["AUTH_SERVICES"],
			"CURRENT_SERVICE" => $arResult["CURRENT_SERVICE"],
			"AUTH_URL" => $arResult["AUTH_URL"],
			"POST" => $arResult["POST"],
			"SHOW_TITLES" => $arResult["FOR_INTRANET"]?'N':'Y',
			"FOR_SPLIT" => $arResult["FOR_INTRANET"]?'Y':'N',
			"AUTH_LINE" => $arResult["FOR_INTRANET"]?'N':'Y',
		),
		$component,
		array("HIDE_ICONS"=>"Y")
	); ?>
<?endif?>