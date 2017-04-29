<?php
/**
 * Created by PhpStorm.
 * User: MyPC
 * Date: 27/04/2017
 * Time: 10:00 SA
 */

include("../../config/config.php");
include("../classes/User.php");
include("../classes/Post.php");

$limit = 10;//Number of posts to be loaded per call

$posts = new Post($con, $_REQUEST['userLoggedIn']);
$posts->loadProfilePosts($_REQUEST, $limit);