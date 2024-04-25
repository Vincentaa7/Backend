<?php
include 'Item.php';

$item = new Item($pdo);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $itemName = $_POST['name'] ?? '';
    if (!empty($itemName))
    {
        $item->addItem($itemName);
    }
}

$items = $item->getAllItems();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style1.css">
    <title>Document</title>
</head>
<body>

<h2>Add Item</h2>
<form method="POST">
    <input type="text" name="name" placeholder="Item name">
    <input type="submit" value="Add">
</form>


<?php include_once 'add_item.php'; ?>

<h2>Item List</h2>
<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Action</th>
    </tr>
    <?php 
    include_once 'view_items.php'; 
    $items = view_items($pdo);
    foreach ($items as $item) {
        echo "<tr>";
        echo "<td>" . $item['id'] . "</td>";
        echo "<td>" . $item['name'] . "</td>";
        echo "<td>";
        echo "<div style='display: inline;'>";
        echo "<a href='update_item.php?id=" . $item['id'] . "'> Update </a>";
        echo "/";
        echo "<a href='delete_item.php?id=" . $item['id'] . "'> Delete </a>";
        echo "</div>";
        echo "</td>";
        echo "</tr>";
    }
    ?>
</table>
     
</body>
</html>