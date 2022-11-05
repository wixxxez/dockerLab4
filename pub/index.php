<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include('api_methods.php');

$apiService = new ApiService;
$apiService->readQuery();

