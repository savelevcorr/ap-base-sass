<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?if (!empty($arResult)):?>
	<ul class="nav">
		<? 	$previousLevel = 0;
		foreach($arResult as $arItem):
			$liClass = "";
			if ($arItem['SELECTED'])
				$liClass = "active";
			?>
			<?if ($previousLevel && $arItem["DEPTH_LEVEL"] < $previousLevel):?>
				<?=str_repeat("</ul></li>", ($previousLevel - $arItem["DEPTH_LEVEL"]));?>
			<?endif?>
			<?if ($arItem["IS_PARENT"]):?>
				<li class="<?=$liClass?>">
					<a href="<?=$arItem["LINK"]?>" ><?=$arItem["TEXT"]?></a>
					<ul class="nav__subnav">
			<?else:?>
				<li class="<?=$liClass?>">
					<a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a>
				</li>
			<?endif?>
			<?$previousLevel = $arItem["DEPTH_LEVEL"];?>
		<?endforeach?>
		<?if ($previousLevel > 1)://close last item tags?>
			<?=str_repeat("</ul></li>", ($previousLevel-1) );?>
		<?endif?>
	</ul>
<?endif?>