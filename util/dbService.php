<?php

require __DIR__ . '/types.php';

class dbService
{
    private ?PDO $con = null;

    function __construct()
    {
        $this->connect();
    }

    function __destruct()
    {
        if ($this->con) {
            $this->con = null;
        }
    }
    private function connect(): bool
    {

        if ($this->con == NULL) {
            try {
                $this->con = new PDO('mysql:host=localhost;dbname=notennest', $GLOBALS['DB_USER'], $GLOBALS['DB_PW']);
                return true;
            } catch (PDOException $e) {
                return false;
            }
        }
        return true;
    }

    function getProductsByCategory(string $category, string $manufacturer, string $price): array
    {

        $result = [];

        if ($this->connect()) {

            $manufacturerFilterActive = false;
            $priceFilterActive = false;

            $stmt_string = 'SELECT inventory.id, inventory.name, inventory.description, manufacturer.name AS manufacturer, inventory.available, inventory.price, inventory.category, inventory.product_image FROM notennest.inventory INNER JOIN notennest.manufacturer ON inventory.manufacturerID=manufacturer.id WHERE inventory.category = :category';
            if($manufacturer !== 'all' && $manufacturer !== '') {
                $manufacturerFilterActive = true;
                $stmt_string = $stmt_string . ' AND manufacturer.id = :manufacturer';
            }

            if($price !== 'all' && $price !== '') {
                $priceFilterActive = true;
                $stmt_string = $stmt_string . ' AND inventory.price BETWEEN :low AND :high';
            }

            $stmt = $this->con->prepare($stmt_string);
            $stmt->bindParam(':category', $category);
            if($manufacturerFilterActive) {
                $stmt->bindParam(':manufacturer', $manufacturer);
            }

            if ($priceFilterActive) {
                $filterValues = explode('-', $price);
                $stmt->bindParam(':low', $filterValues[0]);
                $stmt->bindParam(':high', $filterValues[1]);
            }

            $stmt->execute();

            if ($stmt !== false && $stmt->rowCount() > 0) {
                foreach ($stmt as $row) {
                    array_push(
                        $result,
                        new InventoryItem(
                            $row['id'],
                            $row['name'],
                            $row['description'],
                            $row['manufacturer'],
                            $row['available'],
                            $row['price'],
                            $row['category'],
                            $row['product_image']
                        )
                    );
                }
            }
        }
        return $result;
    }

    function getProductById(int $id): ?InventoryItem
    {

        if ($this->connect()) {
            $stmt = $this->con->prepare('SELECT inventory.id, inventory.name, inventory.description, manufacturer.name AS manufacturer, inventory.available, inventory.price, inventory.category, inventory.product_image FROM notennest.inventory INNER JOIN notennest.manufacturer ON inventory.manufacturerID=manufacturer.id WHERE inventory.id = ?');
            $stmt->execute([$id]);

            if ($stmt !== false && $stmt->rowCount() > 0) {
                $row = $stmt->fetch();
                return new InventoryItem(
                    $row['id'],
                    $row['name'],
                    $row['description'],
                    $row['manufacturer'],
                    $row['available'],
                    $row['price'],
                    $row['category'],
                    $row['product_image']
                );
            }
        }
        return null;
    }

    function getManufacturerForProductCategory(string $category): array
    {

        $result = [];
        if($this->connect()) {
            $stmt = $this->con->prepare('SELECT DISTINCT m.id AS id, m.name AS name FROM manufacturer m JOIN inventory i ON m.id = i.manufacturerID WHERE i.category = :category;');
            $stmt->bindParam(":category", $category);
            $stmt->execute();
            if($stmt !== false && $stmt->rowCount() > 0) {
                foreach($stmt as $row) {
                    array_push($result, new Manufacturer($row['id'], $row['name']));
                }
            }
        }
        return $result;
    }

    function setAvailabilityForItem(int $id, string $available): bool
    {
        if ($this->connect()) {
            $stmt = $this->con->prepare('UPDATE inventory SET available = :available WHERE id = :id;');
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':available', $available);
            if ($stmt->execute() !== false) {
                return true;
            }
        }

        return false;
    }

    function createInquiry(Inquiry $inquiry): bool
    {
        $email = $inquiry->getEmail();
        $subject = $inquiry->getSubject();
        $message = $inquiry->getMessage();

        if ($this->connect()) {
            $stmt = $this->con->prepare('INSERT INTO inquiries (email, subject, message) VALUES (:email, :subject, :message)');
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':subject', $subject);
            $stmt->bindParam(':message', $message);

            if ($stmt->execute() !== false) {
                return true;
            }
        }

        return false;
    }
}
?>