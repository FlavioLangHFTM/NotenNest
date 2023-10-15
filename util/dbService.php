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

    function getProductsByCategory(string $category): array
    {

        $result = [];

        if ($this->connect()) {
            $stmt = $this->con->prepare('SELECT inventory.id, inventory.name, inventory.description, manufacturer.name AS manufacturer, inventory.available, inventory.price, inventory.category, inventory.product_image FROM notennest.inventory INNER JOIN notennest.manufacturer ON inventory.manufacturerID=manufacturer.id WHERE inventory.category = ?');
            $stmt->execute([$category]);

            if ($stmt !== false && $stmt->rowCount() > 0) {
                foreach ($stmt as $row) {
                    array_push($result, new InventoryItem(
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

    function getProductById(int $id): InventoryItem
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

    function setAvailabilityForItem(int $id, bool $available): bool
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