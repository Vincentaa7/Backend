<?php
include 'dbconfig.php';

class Item {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo =$pdo;
    }

    public function getAllItems() {
        $stmt = $this->pdo->query("SELECT * FROM items");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addItem($name) {
        $stmt =$this->pdo->prepare("INSERT INTO items (name) VALUES (:name)");
        $stmt->execute(['name' => $name]);
    }

    public function getItem($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM items WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }



    //add methods for update and delete as nedded
    public function updateItem($id, $name) {
        try {
            $stmt = $this->pdo->prepare("UPDATE items SET name = :name WHERE id = :id");
            $stmt->execute(['id' => $id, 'name' => $name]);
        }
        catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function deleteItem($id) {
        $stmt = $this->pdo->prepare("DELETE FROM items WHERE id = :id");
        $stmt->execute(['id' => $id]);
    }
}

