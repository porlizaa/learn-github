<?PHP
    session_start();
?>
หน้าหลัก User <br>
ผู้ล็อคอินคือ :  <?=$_SESSION['username']?> <br>
ชื่อ : <?=$_SESSION['firstname']?> นามสกุล : <?=$_SESSION['lastname']?> <br>
สถานะ : <?=$_SESSION['status']?> <br>