<?php
require_once __DIR__ . '/vendor/autoload.php';

Flight::route('GET /api/users', function () {
    $users = [
        ['id' => 1, 'full_name' => 'John Doe', 'username' => 'johndoe', 'email' => 'john@example.com'],
        ['id' => 2, 'full_name' => 'Jane Smith', 'username' => 'janesmith', 'email' => 'jane@example.com']
    ];
    Flight::json($users);
});

Flight::route('POST /api/users', function () {
    $data = Flight::request()->data->getData();
    // Here you would normally insert the user into the database
    Flight::json(['message' => 'User successfully added', 'user' => $data]);
});

Flight::route('POST /api/login', function () {
    $data = Flight::request()->data->getData();
    // Here you would normally check the username and password
    if ($data['username'] == 'admin' && $data['password'] == 'admin') {
        Flight::json(['message' => 'Login successful']);
    } else {
        Flight::json(['message' => 'Invalid username or password'], 401);
    }
});

Flight::start();
