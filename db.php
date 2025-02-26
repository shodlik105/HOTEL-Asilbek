<?php
// MySQL ulanish
$con = mysqli_connect("db", "root", "root", "hotel_management");

// Ulana olmasa xatolik chiqarish
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
