<?PHP
    session_start();
    $userid=$_SESSION['userid'];
    if(empty($userid)){
        header("location:index.php");
    }
?>

<link rel="stylesheet" href="style.css">
<?PHP 
    include "_headscript.php";
    include "dbcon.php"; 
    include "topmenu.php";
?>
<div><h2>ข้อมูลนักศึกษา</h2></div>
<div class="divrow">
    <form action="addStudent.php" method="post">
        <div>
            <label>ชื่อจริง</label>
            <input type="text" name="tFirstname" required>
        </div>
        <div>
            <label>นามสกุล</label>
            <input type="text" name="tLastname" required>
        </div>
        <div>
            <label>ที่อยู่</label>
            <textarea name="tAddress" rows="5" required></textarea>
        </div>
        <div>
            <input type="submit" name="bSubmit" value="บันทึกข้อมูล">
        </div>
    </form>
</div>

<div class="divrow">
    <form action="" method="post">
        <div style="text-align: center,font: size 20px;">
            <span style="font-weight:bold">ค้นหาจาก</span>
            <input type="radio" name="rdoType" value="1">รหัสนักศึกษา 
            <input type="radio" name="rdoType" value="2" checked>ชื่อนามสกุล 
        </div>
        <div>
            ค้นหา
            <input type="text" name="tWord">
            <input type="submit" name="bSearch" value="ค้นหา">
        </div>
        <div>
            <input type="submit" name="bShowall" value="แสดงข้อมูลทั้งหมด">
      </div> 
    </form>
</div>

<?php
if(isset($_REQUEST['bSearch'])){
    if($_REQUEST['rdoType']=="1"){
        $sql = "SELECT * FROM tbstudent
            WHERE stdid ='$_REQUEST[tWord]' ";
    }elseif($_REQUEST['rdoType']=="2"){
        $sql = "SELECT * FROM tbstudent
            WHERE firstname Like '%$_REQUEST[tWord]%' 
            or lastname Like '%$_REQUEST[tWord]%' ";
    }
}elseif(isset($_REQUEST['bShowall'])){
    $sql = "SELECT * FROM tbstudent";
}else{
    $sql = "SELECT * FROM tbstudent";
}
    //$sql="SELECT * FROM tbstudent";
    $query=$conn->query($sql);
    
        echo"<table border=1>
            <thead>
                <th>รหัสนักศึกษา</th>
                <th>ชื่อ</th>
                <th>นามสกุล</th>
                <th>ที่อยู่</th>
                <th>แก้ไข/ลบ</th>
            </thead>
            <tbody>";
        while($result=$query->fetch_object()){
            echo"<tr>
                    <td>{$result->stdid}</td>
                    <td>{$result->firstname}</td>
                    <td>{$result->lastname}</td>
                    <td>{$result->address}</td>";
          ?>
            <td>
                    <a href="form_updateStudent.php?id=<?=$result->stdid?>" class="b1">EDIT</a>
                    <a href="delStudent.php?id=<?=$result->stdid?>" class="b2" onclick="return confirm('Are you sure DELETE ?')">DEL</a></td>
            </tr>
          <?php
           }
        echo"</tbody></table>";
?>