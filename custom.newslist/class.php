<?php

use Bitrix\Main\Loader;
use Bitrix\Iblock\ElementTable;

class CustomNewsList extends CBitrixComponent
{
    
     // Проверка параметров
     
    private function checkParams()
    {
        if (!$this->arParams['IBLOCK_TYPE']) {
            ShowError("Не указан тип инфоблока.");
            return false;
        }
        return true;
    }

    
     // Метод для получения элементов
     
    private function getElements()
    {
        $filter = [
            'IBLOCK_TYPE' => $this->arParams['IBLOCK_TYPE'],
            'ACTIVE' => 'Y',
        ];

        if ($this->arParams['IBLOCK_ID'] > 0) {
            $filter['IBLOCK_ID'] = $this->arParams['IBLOCK_ID'];
        }

        if (!empty($this->arParams['FILTER'])) {
            $filter = array_merge($filter, $this->arParams['FILTER']);
        }

        $result = [];
        $res = CIBlockElement::GetList(
            ['SORT' => 'ASC'],
            $filter,
            false,
            false,
            ['ID', 'IBLOCK_ID', 'NAME', 'PREVIEW_TEXT', 'DETAIL_PAGE_URL']
        );

        while ($item = $res->GetNext()) {
            $result[$item['IBLOCK_ID']][] = $item;
        }

        return $result;
    }

    
      // Основной метод компонента
     
    public function executeComponent()
    {
        if (!$this->checkParams()) {
            return;
        }

        $this->arResult['ITEMS'] = $this->getElements();
        $this->includeComponentTemplate();
    }
}
