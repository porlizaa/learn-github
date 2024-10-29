<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<?PHP
  @session_start(); //เริ่มต้นใช้งานเซสชั่น
?>
<style>
    .topnav {
    overflow: hidden;
    background-color: #333;
    }
    .topnav a {
    float: left;
    display: block;
    color: #f2f2f2;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    }
    .topnav a:hover {
    background-color: #ddd;
    color: black;
    }
</style>

<div class="topnav">
  <a href="dashborad.php"><i class="fa-solid fa-gauge"></i> แดชบอร์ด</a>
  <a href="form_addProduct.php"><i class="fa-solid fa-cart-shopping"></i> จัดการข้อมูลสินค้า</a>
  <a href="form_addTypeProduct.php"><i class="fa-solid fa-folder"></i> จัดการข้อมูลประเภท</a>
  <a href="form_addStudent.php"><i class="fa-solid fa-address-card"></i> จัดการข้อมูลนักศึกษา</a>

  <?PHP
    if(isset($_SESSION['userid'])){
  ?>
    <a href="logout.php" style="float:right"><i class="fa-solid fa-lock"></i> ออกจากระบบ</a>
  <?PHP
    }else{
  ?>
    <a href="index.php" style="float:right"><i class="fa-solid fa-lock"></i> เข้าสู่ระบบ</a>
  <?PHP
    }
  ?>


</div>