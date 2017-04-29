<?php
/**
 * Created by PhpStorm.
 * User: MyPC
 * Date: 19/04/2017
 * Time: 4:12 CH
 */

session_start();
session_destroy();
header("Location: ../../register.php");

