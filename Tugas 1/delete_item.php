<?php
require_once 'item.php';

$item = new Item($pdo);
$item->deleteItem($_GET['id']);
header('Location: index.php');