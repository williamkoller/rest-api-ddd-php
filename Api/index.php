<?php

require_once __DIR__ . '/bootstrap.php';

header('Content-Type: application/json');

$method = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

if ($method === 'POST' && $uri === '/users') {
    $requestData = json_decode(file_get_contents("php://input"), true);
    echo $userController->createUser($requestData);
    exit;
}

http_response_code(404);
echo json_encode(["message" => "Router not found"]);
