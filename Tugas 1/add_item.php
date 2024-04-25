<?php
require_once 'Item.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit_add'])) {
    $add_item = new Item($pdo);
    $item_name = $_POST['name'] ?? ''; 

    if(!empty($item_name)) {
        $add_item->addItem(item_name);
    }
}