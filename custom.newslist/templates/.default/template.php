<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<div class="news-list">
    <?php foreach ($arResult['ITEMS'] as $iblockId => $items): ?>
        <div class="iblock-group">
            <h2>Инфоблок ID: <?= $iblockId ?></h2>
            <ul>
                <?php foreach ($items as $item): ?>
                    <li>
                        <a href="<?= $item['DETAIL_PAGE_URL'] ?>"><?= $item['NAME'] ?></a>
                        <p><?= $item['PREVIEW_TEXT'] ?></p>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endforeach; ?>
</div>
