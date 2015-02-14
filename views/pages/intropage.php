<?php
session_start();
if(!isset($_SESSION["session_username"])) {
    header("location:login.php");
} else {
    ?>


    <div id="welcome">
        <h2>Добро пожаловать, <span><?php echo $_SESSION['session_username'];?>! </span></h2>
        <p><a href="index.php?view=logout">Выйти</a> из системы</p>
    </div>


<?php
}
?>