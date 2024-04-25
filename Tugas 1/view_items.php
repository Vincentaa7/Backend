<?php
require_once 'Item.php';

function view_items($pdo) {
    $view_item = new Item($pdo);
    $items = $view_item->getAllItems();

    return $items;
}