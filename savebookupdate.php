<?php include ("conn.php");?>
<?php
$id = $_POST['id'];
$namebook = $_POST['BookName'];
$publish = $_POST['Publish'];
$UnitPrice =$_POST['UnitPrice'];
$UnitRent = $_POST['UnitRent'];

$note = "UPDATE book SET Bookname ='$namebook' ,Publish = '$publish', UnitPrice ='$UnitPrice', UnitRent='$UnitRent' WHERE BookID = '$id' ";

$qly = mysqli_query($conn,$note);

if($qly){
    echo "<center><h1>แก้ไขข้อมูลสำเร็จ</h1>";
} else {
    echo "<center><h1>แก้ไขข้อมูลไม่สำเร็จ</h1>";
}
echo "<button><a href = 'listofbook2.php'>กลับหน้าหลัก</a></button>";




?>