<?php
session_start();
$session = $_SESSION['professor'];
if(!isset($session)){
    echo "<script type='text/javascript'> location.href='../login.php'</script>";
}
?>