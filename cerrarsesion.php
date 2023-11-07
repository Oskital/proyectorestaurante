



<?php

session_start();


if(isset($_POST["Enviar"])){


session_destroy();
header("Location: login.html");

}



?>