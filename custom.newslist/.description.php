<?php

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$arComponentDescription = [
    'NAME' => 'Кастомный список новостей',
    'DESCRIPTION' => 'Компонент для вывода новостей с группировкой по ID инфоблоков',
    'PATH' => [
        'ID' => 'custom_components',
        'CHILD' => [
            'ID' => 'custom_news',
            'NAME' => 'Кастомные новости',
        ],
    ],
];
