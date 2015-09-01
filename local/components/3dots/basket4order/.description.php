<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arComponentDescription = array(
	"NAME" => "Корзина и оформление заказа",
	"DESCRIPTION" => "Компонент позволяет просмотреть и отредактировать корзину, а так же оформить заказ",
	"ICON" => "/images/icon.gif",
	"SORT" => 10,
	"CACHE_PATH" => "Y",
	"PATH" => array(
		"ID" => "3t", // for example "my_project:services"
		"NAME" => "Компонеты студии 3 точки",  // for example "Services"
		/*"CHILD" => array(
			"ID" => "", // for example "my_project:services"
			"NAME" => "",  // for example "Services"
		),*/
	),
	"COMPLEX" => "N",
);

?>