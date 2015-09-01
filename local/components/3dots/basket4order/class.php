<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

class CGoodBasket extends CBitrixComponent
{
	public $arResult;
    public function executeComponent()
    {
        $this->arResult = $_SERVER;

        $this->includeComponentTemplate();
    }

    public function getBasketItems()
    {

    }

    public function  isAjax(){
        $isAjax = false;
        if($isAjax){
            return true;
        }
        return false;
    }
};?>