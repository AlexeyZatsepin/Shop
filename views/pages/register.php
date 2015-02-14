
<div class="container mregister">
    <div id="login">
        <h1>Registration</h1>
        <form action="index.php?view=register" id="registerform" method="post" name="registerform">
            <p><label for="user_login">Name<br>
                    <input class="input" id="full_name" name="full_name"size="32"  type="text" value=""></label></p>
            <p><label for="user_pass">E-mail<br>
                    <input class="input" id="username" name="username"size="20" type="text" value=""></label></p>
            <p><label for="user_pass">Password<br>
                    <input class="input" id="password" name="password"size="32"   type="password" value=""></label></p>
            <p class="submit"><input class="button" id="register" name= "register" type="submit" value="Ok"></p>
            <p class="regtext">Registred? <a href= "index.php?view=login">Name please</a>!</p>
        </form>
    </div>
</div>
<?php

if(isset($_POST["register"])){

    if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['password'])) {
        $name=$_POST['name'];
        $email=$_POST['email'];
 $password=$_POST['password'];
 $query=mysql_query("SELECT * FROM lp_users WHERE name='".$name."'");
  $numrows=mysql_num_rows($query);
if($numrows==0)
{
    $sql="INSERT INTO lp_users
  (name, email, password)
	VALUES('$name','$email', '$password')";
    $result=mysql_query($sql);
    if($result){
        $message = "Account Successfully Created";
    } else {
        $message = "Failed to insert data information!";
    }
} else {
    $message = "That username already exists! Please try another one!";
}
	} else {
        $message = "All fields are required!";
    }
}
?>

<?php if (!empty($message)) {echo "<p class=\"error\">" . "MESSAGE: ". $message . "</p>";} ?>
