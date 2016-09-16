<?php

/**
 *
 * Users will land in public directory
 * In public/
 * there is index.php which is a bootstrapping file and calling init.php
 * init.php will call new application instance of an object which will be stored in app/core directory
 * The App method parsUrl() will return and array $url of parsed URL
 * Then it will read url if is available and it will
 * App (once it has parsed URL will call controller np Home
 * and controller will load model and and render the view
 * In model directory you will have a model available to use
 *
 */

// Dodasz database.php z PDO
// I w modelu zrobisz dependency injection tak by miec obiekt db i wtedy masz dojscie do bazy danych
// i jestes w domu

// get out from public folder into app and call init.php for initialization
require_once '../app/init.php';
