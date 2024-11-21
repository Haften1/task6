
<?php

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Loader;

if (!Loader::includeModule('iblock')) {
    ShowError("Модуль 'Информационные блоки' не установлен.");
    return;
}

$arParams['IBLOCK_TYPE'] = trim($arParams['IBLOCK_TYPE']);
$arParams['IBLOCK_ID'] = intval($arParams['IBLOCK_ID']);
$arParams['FILTER'] = is_array($arParams['FILTER']) ? $arParams['FILTER'] : [];

$component = new CustomNewsList($this, $arParams);
$component->executeComponent();
