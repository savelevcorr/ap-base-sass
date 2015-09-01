<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("column", "2");
$APPLICATION->SetTitle("Title");
inc("header_after.php");
?>

<p class="text-warning">
	Раздел находится в наполнении
</p>

<?
inc("footer_before.php");
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>