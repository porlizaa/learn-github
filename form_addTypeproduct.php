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

<div><h2>ข้อมูลประเภทสินค้า</h2></div>
<div class="divrow">
    <form action="addTypeproduct.php" method="post">
        <div>
            <label>ประเภทสินค้า</label>
            <input type="text" name="typename" required>
        </div>
        <div>
            <input type="submit" name="bSubmit" value="บันทึกข้อมูล">
        </div>
    </form>
</div>

<div class="divrow">
    <form action="" method="post">
        <div>
            ค้นหา
            <input type="text" name="tWord" required>
            <input type="submit" name="bSearch" value="ค้นหา"
        </div>
    </form>
</div>

<?php
    $sql="SELECT * FROM tbtypeproduct";
    $query=$conn->query($sql);
    
        echo"<table border=1>
            <thead>
                <th>รหัสสินค้า</th>
                <th>ประเภทสินค้า</th>
                <th>แก้ไข/ลบ</th>
            </thead>
            <tbody>";
        while($result=$query->fetch_object()){
            echo"<tr>
                    <td>{$result->typeid}</td>
                    <td>{$result->typename}</td>";
          ?>
            <td>
                    <a href="form_updateTypeproduct.php?id=<?=$result->typeid?>" class="b1">EDIT</a>
                    <a href="delTypeproduct.php?id=<?=$result->typeid?>" class="b2" onclick="return confirm('Are you sure DELETE ?')">DEL</a></td>
            </tr>
          <?php
           }
        echo"</tbody></table>";
?>