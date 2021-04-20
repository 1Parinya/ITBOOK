<!DOCTYPE html>
<HTML>
<HEAD><TITLE>Update table book</TITLE></HEAD>
<BODY>
<?php include 'conn.php';?>
<?php

    session_start();
   
$sqltxt = mysqli_query($conn,"SELECT * FROM book order by BookID")
        or die (mysqli_error($conn));

        echo "<CENTER><H4>";
        echo "สวัสดี - " , $_SESSION['login'];
        echo "</H4></CENTER>";
        echo "<CENTER><H3>รายชื่อหนังสือ</H3></CENTER>";
        echo "<table width=\"400\" border=\"0\" bordercolor=\"D1D7DA\" ";
        echo "align = \"center\" valign = \"top\" >";
        echo " <br><b><tr align=\"center\" bgcolor=\"#0099CC\">";
        echo "<td width =\"30\" align=\"center\">ลำดับ</font></td>";
        echo "<td width =\"100\" align=\"center\" >รหัสหนังสือ</td>";
        echo "<td align=\"center\" width = \"200\">ชื่อหนังสือ</td>";
        if($_SESSION['login']=="admin"){
            echo "<td align =\"center\" width=\"80\">แก้ไข</a></font></td>";
            echo "<td align =\"center\" width=\"80\">ลบ</a></font></td>\n</b>";
        }else {

        }

$a=1;
while ($rs = mysqli_fetch_array ($sqltxt))
{
        echo "<tr align=\"center\" bgcolor=\"#CCFFFF\">";
        echo "<td align=\"center\" bgcolor =\"#0099CC\">$a</td>";
        echo "<td align=\"center\"> ";
        echo "<a href=\"detailbook2.php?id=$rs[0]\">$rs[0]</a></td>";
        echo "<td align=\"center\">$rs[1]</td>";
   

        if($_SESSION['login']=="admin"){
            echo "<td align =\"center\" ><a href=\"updatebook.php?id=$rs[0]\" ";
            echo "oneclick=\"return confirm(' ยืนยันการแก้ไขข้อมูลหนังสือ $rs[1]')\">[แก้ไข]";
            echo "</a></font></td>\n";

            echo "<td align =\"center\"> <a href=\"deletebook2.php?id=$rs[0]\" ";
            echo "oneclick=\"return confirm(' ยืนยันการลบข้อมูลหนังสือ $rs[1]')\">[ลบ]";
            echo "</a></font></td>\n";
            $a++;
            
        }
        else {

        }

    }       



?>

<?php
if($_SESSION['login']=="admin"){?>

</tr></table><br><br>
<div align = 'center'0 ><a href='addbook.php'>เพิ่มรายการหนังสือ</a></div><br>
<div align = "center"0 ><a href="logout.php">ออกจากระบบ</a></div><br>
<?php
}
else {
    echo"<div align = 'center'0 ><a href='logout.php'>ออกจากระบบ</a></div><br>";
}

?>

<?php
        mysqli_close($conn);
?>
</BODY>
</HTML>