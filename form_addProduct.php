<?PHP
    session_start();
    $userid=$_SESSION['userid'];
    if(empty($userid)){
        header("location:index.php");
    }
?>

<link rel="stylesheet" href="style.css">
<?php 
    include "_headscript.php";
    include "dbcon.php"; 
    include "topmenu.php";
?>

<div><h2>ข้อมูลสินค้า</h2></div>
<div class="divrow">
    <form action="addProduct.php" method="post" enctype="multipart/form-data">
        <div>
            <label>ชื่อสินค้า</label>
            <input type="text" name="tProname" required>
        </div>
        <div>
            <label>ราคา</label>
            <input type="number" name="tPrice" required>
        </div>
        <div>
            <label>ลักษณะสินค้า</label>
            <textarea name="tDetail" rows="5" required></textarea>
        </div>
        <div>
            <label>อัพโหลดไฟล์</label>
            <input type="file" name="fileupload" required>
        </div>
        <div>
            <label>ประเภทสินค้า	</label>
            <select name="tTypeid">
                <?php
                    $sqlType = "SELECT * FROM tbtypeproduct";
                    $queryType = $conn->query($sqlType);
                    while ($rsType = $queryType->fetch_object()) {
                ?>
                    <option value="<?=$rsType->typeid?>">
                        <?=$rsType->typename?>
                    </option>
                <?php } ?>
            </select>
        </div>
        <div>
            <input type="submit" name="bSubmit" value="บันทึกข้อมูล">
        </div>
    </form>
</div>

//ออกสอบ
<div class="divrow">
    <form action="" method="post">
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
    $sql = "SELECT * FROM tbproduct
            WHERE proname Like '%$_REQUEST[tWord]%' ";
}elseif($_REQUEST['bShowall']){
    $sql = "SELECT * FROM tbproduct";
}else{
    $sql = "SELECT * FROM tbproduct
    ";
}
    $query = $conn->query($sql);

    echo "<table border=1>
            <thead>
                <th>รหัสสินค้า</th>
                <th>รูปภาพ</th>
                <th>ชื่อสินค้า</th>
                <th>ราคาสินค้า</th>
                <th>ลักษณะสินค้า</th>
                <th>ประเภทสินค้า</th>
                <th>แก้ไข/ลบ</th>
            </thead>
            <tbody>";

    while ($result = $query->fetch_object()) {

        // ส่วนของการ Join table
        $sqlType = "SELECT * FROM tbtypeproduct WHERE typeid='$result->typeid'";
        $queryType = $conn->query($sqlType);
        $rsType = $queryType->fetch_object();

        echo "<tr>
                <td>{$result->proid}</td>
                <td><img src='img/{$result->pic}' width='100px'></td>
                <td>{$result->proname}</td>
                <td>{$result->price}</td>
                <td>{$result->detail}</td>
                <td>{$rsType->typename}</td>
                <td>
                    <a href='form_updateProduct.php?id={$result->proid}' class='b1'>EDIT</a>
                    <a href='delProduct.php?id={$result->proid}' class='b2' onclick='return confirm(\"Are you sure DELETE ?\")'>DEL</a>
                </td>
              </tr>";
    }
    echo "</tbody></table>";
?>
