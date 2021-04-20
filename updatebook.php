<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update book</title>
</head>

<body>
    <?php include 'conn.php' ?>
    <?php

    $id = $_GET['id'];
    $sql = "SELECT * FROM book WHERE BookID = $id";
    $result = mysqli_query($conn,$sql);


?>

    <form method="POST" action="savebookupdate.php">

    <?php
    while ($data = mysqli_fetch_array($result)) {
        echo "<table border=1 align = center bgcolor = #FFCCCC>";
        echo "<tr><td align=center colspan = 2 bgcolor = #FF99CC><b>แก้ไข รายละเอียดหนังสือ
        </b></td></tr>";

        echo "<tr><td width = '100'>รหัสหนังสือ : </td><td><input type='text' value = '$data[BookID]' disabled><input type='hidden' name='id' value='$data[BookID]'></td></tr>";
        echo "<tr><td> ชื่อหนังสือ : </td><td><input type='text' name='BookName'value ='$data[BookName]'></td></tr>";
        echo "<tr><td> สำนักพิมพ์ : </td><td><input type='text' name='Publish'value ='$data[Publish]'></td></tr>";
        echo "<tr><td> ราคาซื้อ : </td><td><input type='text' name='UnitPrice'value ='$data[UnitPrice]'></td></tr>";
        echo "<tr><td> ราคาเช่า : </td><td><input type='text' name='UnitRent'value ='$data[UnitRent]'></td></tr>";
        echo "</table>";
    }
?>

        <br>
        <div align="center" name="Submit" value="แก้ไขข้อมุล" style="cursor:hand">
            <input type="submit" name="Submit" value="แก้ไขข้อมูล" style="cursor:hand">
            <input type="reset" name="Reset" value="ยกเลิก" style="cursor:hand">
        </div><br>
    </form>
    <div align="center"> <a href="listofbook2.php">กลับหน้าหลัก</a></div><br>

</body>

</html>