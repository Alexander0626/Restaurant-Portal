<?php
class RestaurantDatabase {
    private $host = "localhost";
    private $port = "3309";
    private $database = "restaurant_reservations";
    private $user = "root";
    private $password = "282022";
    private $connection;

    public function __construct() {
        $this->connect();
    }

    private function connect() {
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        try {
            $this->connection = new mysqli($this->host, $this->user, $this->password, $this->database, $this->port);
            
        } catch (mysqli_sql_exception $e) {
            die("Database connection error: " . $e->getMessage());
        }
    }

    public function addReservation($customerId, $reservationTime, $numberOfGuests, $specialRequests) {
        $stmt = $this->connection->prepare(
            "INSERT INTO reservations (customerId, reservationTime, numberOfGuests, specialRequests) VALUES (?, ?, ?, ?)"
        );
        $stmt->bind_param("isis", $customerId, $reservationTime, $numberOfGuests, $specialRequests);
        $stmt->execute();
        $stmt->close();
        echo "Reservation added successfully";
    }

    public function getAllReservations() {
        $result = $this->connection->query("SELECT * FROM reservations");
        return $result->fetch_all(MYSQLI_ASSOC);
    } 

    public function addCustomer($customerName, $contactInfo) {
        $stmt = $this->connection->prepare(
            "INSERT INTO customers (customerName, contactInfo) VALUES (?, ?)"
        );
        $stmt->bind_param("ss", $customerName, $contactInfo);
        $stmt->execute();
        $stmt->close();
        echo "Customer added successfully";
    }
    
    public function getCustomerPreferences($customerId) {
        $stmt = $this->connection->prepare(
            "SELECT favoriteTable, dietaryRestrictions FROM diningpreferences WHERE customerId = ?"
        );
        $stmt->bind_param("i", $customerId);
        $stmt->execute();
        $result = $stmt->get_result();
        $preferences = $result->fetch_assoc();
        $stmt->close();
        return $preferences;
    }

    public function addSpecialRequest($reservationId, $requests) {
        $stmt = $this->connection->prepare(
            "UPDATE reservations SET specialRequests = ? WHERE reservationId = ?"
        );
        $stmt->bind_param("si", $requests, $reservationId);
        $stmt->execute();
        $stmt->close();
        echo "Special request updated successfully";
    }
    
    public function findReservations($customerId) {
        $stmt = $this->connection->prepare(
            "SELECT * FROM reservations WHERE customerId = ?"
        );
        $stmt->bind_param("i", $customerId);
        $stmt->execute();
        $result = $stmt->get_result();
        $reservations = $result->fetch_all(MYSQLI_ASSOC);
        $stmt->close();
        return $reservations;
    }
    public function addDiningPreferences($customerId, $favoriteTable, $dietaryRestrictions) {
        $stmt = $this->connection->prepare(
            "INSERT INTO diningpreferences (customerId, favoriteTable, dietaryRestrictions) VALUES (?, ?, ?)"
        );
        $stmt->bind_param("iss", $customerId, $favoriteTable, $dietaryRestrictions);
        $stmt->execute();
        $stmt->close();
        echo "Dining preferences added successfully.";
    }
    
    public function deleteReservation($reservationId) {
        $stmt = $this->connection->prepare(
            "DELETE FROM reservations WHERE reservationId = ?"
        );
        $stmt->bind_param("i", $reservationId);
        $stmt->execute();
        $stmt->close();
        echo "Reservation deleted successfully";
    }
    public function findCustomer($customerName, $contactInfo) {
        $stmt = $this->connection->prepare(
            "SELECT * FROM customers WHERE customerName = ? AND contactInfo = ?"
        );
        $stmt->bind_param("ss", $customerName, $contactInfo);
        $stmt->execute();
        $result = $stmt->get_result();
        $customer = $result->fetch_assoc();
        $stmt->close();
        return $customer;
    }
    

    public function searchPreferences($customerId) {
        return $this->getCustomerPreferences($customerId);
    }
    
    
}
?>
