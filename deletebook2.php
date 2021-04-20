<?php include 'conn.php';?>
<?php
$id = $_GET['id'];
$sql = "DELETE FROM book WHERE BookID = '$id' ";
mysqli_query($conn,$sql) or die ( "DELETE จากตาราง book มีข้อผิดพลาดเกิดข้ึน"
.mysqli_error($conn));
mysqli_close ( $conn );
header("Location:listofbook2.php");
?>