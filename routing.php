<?php
/**
 * Created by PhpStorm.
 * User: MyPC
 * Date: 25/04/2017
 * Time: 3:58 CH
 */
$path = ltrim($_SERVER['REQUEST_URI'], '/');    // Trim leading slash(es)
$elements = explode('/', $path);                // Split path on slashes
if (empty($elements[0])) {                       // No path elements means home
    return false;
} else {
    include('profile.php');
}


