<?php
function doDB() {
    global $mysqli;

    $mysqli = mysqli_connect("localhost","root","","addressBook");

    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
}

?>