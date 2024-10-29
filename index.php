<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<?PHP 
    include"topmenu.php";
    include"dbcon.php"; 
?>

<div class="divrow" style="width:60%;margin:auto;margin-top:20px;">
 <form action="checklogin.php" method="post">
  <div><label>USERNAME</label>
   <input type="text" name="tUsername" required>
  </div>
        <div><label>PASSWORD</label>
   <input type="password" name="tPassword" required>
  </div>
  <div><input type="submit" name="bSubmit" value="เข้าสู่ระบบ"></div>
 </form>
</div>