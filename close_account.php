<?php
/**
 * Created by PhpStorm.
 * User: MyPC
 * Date: 11/05/2017
 * Time: 9:38 SA
 */

include("includes/header.php");

if (isset($_POST['cancel'])) {
    header("Location: settings.php");
}

if (isset($_POST['close_account'])) {
    $close_query = mysqli_query($con, "UPDATE users SET user_closed = 'yes' WHERE username='$userLoggedIn'");
    session_destroy();
    header("Location:register.php");
}

?>

<div class="main_column column">
    <h4>Close Account</h4>

    Are you sure you want to close your account?<br><br>
    Closing you account will hide you profile and all you activity from others user.<br><br>
    You can re-open you account ay any time by simply logging in.<br><br>

    <form action="close_account.php" method="post">
        <input type="submit" name="close_account" id="close_account" value="Yes! Close it!"
               class="danger settings_submit">
        <input type="submit" name="cancel" id="update_details" value="No way!" class="info settings_submit">
    </form>

</div>
