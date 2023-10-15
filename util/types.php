<?php
    // Define some basic object types for our database objects.
    // This makes working with them A LOT easier.

    class InventoryItem {
        private int $id;
        private string $name;
        private string $description;
        private string $manufacturer;
        private bool $available;
        private float $price;
        private string $category;
        private string $productImage;
    
        public function __construct(
            int $id,
            string $name,
            string $description,
            string $manufacturer,
            bool $available,
            float $price,
            string $category,
            string $productImage
        ) {
            $this->id = $id;
            $this->name = $name;
            $this->description = $description;
            $this->manufacturer = $manufacturer;
            $this->available = $available;
            $this->price = $price;
            $this->category = $category;
            $this->productImage = $productImage;
        }
    
        public function getId() {
            return $this->id;
        }
    
        public function setId(int $id) {
            $this->id = $id;
        }
    
        public function getName() {
            return $this->name;
        }
    
        public function setName(string $name) {
            $this->name = $name;
        }
    
        public function getDescription() {
            return $this->description;
        }
    
        public function setDescription(string $description) {
            $this->description = $description;
        }
    
        public function getManufacturer() {
            return $this->manufacturer;
        }
    
        public function setManufacturer(string $manufacturer) {
            $this->manufacturer = $manufacturer;
        }
    
        public function isAvailable() {
            return $this->available;
        }
    
        public function setAvailable(bool $available) {
            $this->available = $available;
        }
    
        public function getPrice() {
            return $this->price;
        }
    
        public function setPrice(float $price) {
            $this->price = $price;
        }
    
        public function getCategory() {
            return $this->category;
        }
    
        public function setCategory(string $category) {
            $this->category = $category;
        }
    
        public function getProductImage() {
            return $this->productImage;
        }
    
        public function setProductImage(string $productImage) {
            $this->productImage = $productImage;
        }
    }
    
    class Inquiry {
        private int $id;
        private string $email;
        private string $subject;
        private string $message;
    
        public function __construct(
            int $id,
            string $email,
            string $subject,
            string $message
        ) {
            $this->id = $id;
            $this->email = $email;
            $this->subject = $subject;
            $this->message = $message;
        }
    
        public function getId() {
            return $this->id;
        }
    
        public function setId(int $id) {
            $this->id = $id;
        }
    
        public function getEmail() {
            return $this->email;
        }
    
        public function setEmail(string $email) {
            $this->email = $email;
        }
    
        public function getSubject() {
            return $this->subject;
        }
    
        public function setSubject(string $subject) {
            $this->subject = $subject;
        }
    
        public function getMessage() {
            return $this->message;
        }
    
        public function setMessage(string $message) {
            $this->message = $message;
        }
    }

    class Manufacturer {
        private $id;
        private $name;
    
        public function __construct($id, $name) {
            $this->id = $id;
            $this->name = $name;
        }
    
        public function getId() {
            return $this->id;
        }
    
        public function getName() {
            return $this->name;
        }
    
        public function setName($name) {
            $this->name = $name;
        }
    }
    
    

?>

