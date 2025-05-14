<?php
require 'vendor/autoload.php';

Flight::route('GET /api/users', function() {
    echo 'Users endpoint working!';
});

Flight::route('POST /api/users', function() {
    echo 'Create user endpoint working!';
});

Flight::route('POST /api/login', function() {
    echo 'Login endpoint working!';
});

Flight::start();
