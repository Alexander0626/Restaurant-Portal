<?php
require_once 'restaurantDatabase.php';

class RestaurantPortal {
    private $db;

    public function __construct() {
        $this->db = new RestaurantDatabase();
    }

    public function handleRequest() {
        $action = $_GET['action'] ?? 'home';
        switch ($action) {
            case 'addReservation':
                $this->addReservation();
                break;
            case 'viewReservations':
                $this->viewReservations();
                break;
            case 'viewPreferences':
                $this->viewPreferences();
                break;
            case 'deleteReservation':
                $this->deleteReservation();
                break;
            case 'addCustomer':
                $this->addCustomer();
                break;
            case 'findReservation':
                $this->findReservation();
                break;
            case 'addSpecialRequest':
                $this->addSpecialRequest();
                break;
            case 'addDiningPreferences':
                $this->addDiningPreferences();
                break;   
            default:
                $this->home();
        }

    }

    private function home() {
        include 'templates/home.php';
    }


    private function addReservation() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Process the form submission
            $customerName = $_POST['customer_name'];
            $contactInfo = $_POST['contact_info'];
            $reservationTime = $_POST['reservation_time'];
            $numberOfGuests = $_POST['number_of_guests'];
            $specialRequests = $_POST['special_requests'];
    
            // Check if the customer exists or add them
            $existingCustomer = $this->db->findCustomer($customerName, $contactInfo);
            if (!$existingCustomer) {
                $this->db->addCustomer($customerName, $contactInfo);
                $existingCustomer = $this->db->findCustomer($customerName, $contactInfo);
            }
    
            $customerId = $existingCustomer['customerId'];
            $this->db->addReservation($customerId, $reservationTime, $numberOfGuests, $specialRequests);
    
            // Redirec to view reservations
            header("Location: index.php?action=viewReservations&message=Reservation Added");
        } else {
            // display add reservation form
            include 'templates/addReservation.php';
        }
    }
    private function addDiningPreferences() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $customerId = $_POST['customer_id'];
            $favoriteTable = $_POST['favorite_table'];
            $dietaryRestrictions = $_POST['dietary_restrictions'];
            
        $this->db->addDiningPreferences($customerId, $favoriteTable, $dietaryRestrictions);
        header("Location: index.php?action=home&message=Dining Preferences Added");
    } else {
        include 'templates/addDiningPreferences.php';
        }
    }

    private function viewPreferences() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // fetch customer preferences on submit
        $customerId = $_POST['customer_id'];
        $preferences = $this->db->getCustomerPreferences($customerId);

        if ($preferences) {
            include 'templates/viewPreferences.php';
        } else {
            echo "<h3>No preferences found for Customer ID {$customerId}</h3>";
            echo '<a href="index.php?action=viewPreferences">Try again</a>';
        }
    } else {
        // Rendering for GET requests
        include 'templates/customerIdForm.php';
    }
}
    
    private function deleteReservation() {
        if (isset($_GET['reservation_id'])) {
            $reservationId = $_GET['reservation_id'];
            $this->db->deleteReservation($reservationId);
            header("Location: index.php?action=viewReservations&message=Reservation Deleted");
        } else {
            echo "Reservation ID is required.";
        }
    }
    
    private function viewReservations() {
        $reservations = $this->db->getAllReservations();
        include 'templates/viewReservations.php';
    } 
    private function addCustomer() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $customerName = $_POST['customer_name'];
            $contactInfo = $_POST['contact_info'];
            $this->db->addCustomer($customerName, $contactInfo);
            header("Location: index.php?action=home&message=Customer Added");
        } else {
            include 'templates/addCustomer.php';
        }
    }
    
    private function findReservation() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $customerId = $_POST['customer_id'];
            $reservations = $this->db->findReservations($customerId);
            include 'templates/viewFoundReservation.php';
        } else {
            include 'templates/findReservation.php';
        }
    }
    
    private function addSpecialRequest() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $reservationId = $_POST['reservation_id'];
            $specialRequest = $_POST['special_request'];
            $this->db->addSpecialRequest($reservationId, $specialRequest);
            header("Location: index.php?action=viewReservations&message=Request Added");
        } else {
            include 'templates/addSpecialRequest.php';
        }  
    }
}

$portal = new RestaurantPortal();
$portal->handleRequest();
