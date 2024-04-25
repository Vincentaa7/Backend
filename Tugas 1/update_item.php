<?php
require_once 'Item.php';

$item = new Item($pdo);
$current_item = $item->getItem($_GET['id']);

if (isset($_POST['submit_update'])) {
    $item->updateItem($_GET['id'], $_POST['name']) ;
    header ('Location: index.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Item</title>
    <link rel="stylesheet" href="style1.css">
</head>
<body>
    <form method="post">
    <input type="text" name="name"  value="<?php echo htmlspecialchars($current_item['name']);?>">
    <input type="submit" name="submit_update" value='Update'>
    </form>  
</body>
</html>