<?php
/**
 * Created by PhpStorm.
 * User: MyPC
 * Date: 14/04/2017
 * Time: 3:57 CH
 */
require 'config/config.php';
include('includes/classes/User.php');
include('includes/classes/Post.php');
include('includes/classes/Message.php');

if (isset($_SESSION['username'])) {
    $userLoggedIn = $_SESSION['username'];
    $user_details_query = mysqli_query($con, "SELECT * FROM users WHERE  username = '$userLoggedIn'");
    $user = mysqli_fetch_array($user_details_query);
} else {
    header('Location:register.php');
}


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome to SwirlFeed</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src='../assets/js/bootstrap.js'></script>
    <script src='../assets/js/bootbox.min.js'></script>
    <script src='../assets/js/demo.js'></script>
    <script src="../assets/js/jquery.Jcrop.js"></script>
    <script src="../assets/js/jcrop_bits.js"></script>
    <link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.css ">
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/jquery.Jcrop.css" type="text/css">
</head>
<body>

<div class="top_bar">
    <div class="logo">
        <a href="index.php">Swirlfeed!</a>
    </div>

    <nav>

        <?php
        //            Unread messages
        $messages = new Message($con, $userLoggedIn);
        $num_messages = $messages->getUnreadNumber();
        ?>

        <a href="<?php echo 'profile.php?profile_username=' . $userLoggedIn; ?>">
            <?php
            echo $user['first_name'];
            ?>
        </a>

        <a href="index.php">
            <i class="fa fa-home fa-lg"></i>
        </a>
        <a href="javascript:void(0);" onclick="getDropdownData('<?php echo $userLoggedIn; ?>','message')">
            <i class="fa fa-envelope fa-lg"></i>
            <?php
            if ($num_messages > 0) {
                echo '<span class="notification_badge" id="unread_message">' . $num_messages . '</span>';
            }
            ?>
        </a>
        <a href="#">
            <i class="fa fa-bell fa-lg"></i>
        </a>

        <a href="requests.php">
            <i class="fa fa-users fa-lg"></i>
        </a>

        <a href="#">
            <i class="fa fa-cog fa-lg"></i>
        </a>

        <a href="includes/handlers/logout.php">
            <i class="fa fa-sign-out fa-lg"></i>
        </a>


    </nav>

    <div class="dropdown_data_window" style="height: 0px; border: none;"></div>
    <input type="hidden" id="dropdown_data_type" value="">


</div>

<script>
    var userLoggedIn = '<?php echo $userLoggedIn; ?>';

    $(document).ready(function () {

        $('.dropdown_data_window').scroll(function () {
            var innner_height = $('.dropdown_data_window').innerHeight();//Div containing data
            var scroll_top = $('.dropdown_data_window').scrollTop();
            var page = $('.dropdown_data_window').find('.nextPageDropDownData').val();
            var noMoreData = $('.dropdown_data_window').find('.noMoreDropdownData').val();

            if ((scroll_top + innner_height >= $('.dropdown_data_window')[0].scrollHeight) && noMoreData == 'false') {

                var pageName;//Holds name of page to send ajax request to
                var type = $('#dropdown_data_type').val();

                if (type == 'notification') {
                    pageName = "ajax_load_notification.php";
                }
                else if (type == "messages") {
                    pageName = "ajax_load_messages.php";
                }

                var ajaxReq = $.ajax({
                    url: "includes/handlers/" + pageName,
                    type: "POST",
                    data: "page=" + page + "&userLoggedIn=" + userLoggedIn,
                    cache: false,

                    success: function (response) {
                        $('.dropdown_data_window').find('.nextPageDropDownData').remove();//Removes current .nextpage
                        $('.dropdown_data_window').find('.noMoreDropdownData').remove();//Removes current .nextpage

                        $('.dropdown_data_window').append(response);
                    }
                });

            }

            return false;

        });


    });


</script>


<div class="wrapper">


</body>