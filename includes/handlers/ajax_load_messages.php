<?php
/**
 * Created by PhpStorm.
 * User: MyPC
 * Date: 29/04/2017
 * Time: 10:48 SA
 */
include("../../config/config.php");
include("../classes/User.php");
include("../classes/Message.php");

$limit = 7;//Number of messages to load

$message = new Message($con, $_REQUEST['userLoggedIn']);
echo $message->getConvosDropdown($_REQUEST, $limit);




