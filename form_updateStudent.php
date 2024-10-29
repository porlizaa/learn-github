<link rel="stylesheet" href="style.css">
<?PHP 
    include"topmenu.php";
    include"dbcon.php"; 

    $sql="SELECT * FROM tbstudent
        WHERE stdid='$_REQUEST[id]' ";
    $query=$conn->query($sql);
    $rs=$query->fetch_object();
?>

<div><h2>แก้ไขข้อมูลนักศึกษา</h2></div>
<div class="divrow">
 <form action="" method="post">
  <div><label>FIRSTNAME</label>
   <input type="text" 
            name="tFirstname"
            value="<?=$rs->firstname?>" required>
  </div>
        <div><label>LASTNAME</label>
   <input type="text" 
            name="tLastname"
            value="<?=$rs->lastname?>" required>
  </div>
        <div><label>ADDRESS</label>
   <textarea name="tAddress" 
            rows="5" required><?=$rs->address?></textarea>
  </div>
  <div><input type="submit" name="bSubmit" value="บันทึกข้อมูล"></div>
 </form>
</div>
<?PHP //ส่วนของการอัพเดตข้อมูล
    if(isset($_REQUEST['bSubmit'])){ 
        //รับค่าจาก textbox มาเก็บที่ตัวแปร
        $firstname=$_REQUEST['tFirstname'];
        $lastname=$_REQUEST['tLastname'];
        $address=$_REQUEST['tAddress'];
        //เขียนโค้ดส่วนของการอัพเดตลงฐานข้อมูล
        $sqlUpdate="UPDATE tbstudent
            SET firstname='$firstname',
                lastname='$lastname',
                address='$address'
            WHERE stdid='$_REQUEST[id]' ";
        $queryUpdate=$conn->query($sqlUpdate);
        if($queryUpdate){ 
            echo"<strong>แก้ไขข้อมูลนักศึกษาเรียบร้อย. </strong>";
            echo "<META HTTP-EQUIV='refresh' 
            CONTENT='0; URL=form_addStudent.php'>";  
        }
    }
?>