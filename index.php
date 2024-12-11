<?php
require_once 'RestaurantServer.php';

// Handles home route
$action = $_GET['action'] ?? 'home';

$portal = new RestaurantPortal();
$portal->handleRequest($action);
