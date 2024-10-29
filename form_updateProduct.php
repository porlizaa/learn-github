<link rel="stylesheet" href="style.css">
<?php 
    include "dbcon.php"; 
    include "topmenu.php";
    
    $sql="SELECT * FROM tbproduct
        WHERE proid='$_REQUEST[id]'";
    $query=$conn->query($sql);
    $rs=$query->fetch_object();
    
?>

<div><h2>ข้อมูลสินค้า</h2></div>
<div class="divrow">
    <form action="" method="post" enctype="multipart/form-data">
        <div>
            <label>ชื่อสินค้า</label>
            <input type="text" name="tProname" 
            value="<?=$rs->proname?>" required>
        </div>
        <div>
            <label>ราคา</label>
            <input type="number" name="tPrice" 
            value="<?=$rs->price?>" required>
        </div>
        <div>
            <label>ลักษณะสินค้า</label>
            <textarea name="tDetail" rows="5" required><?=$rs->detail?></textarea>
        </div>
        <div>
            <img src="img/<?=$rs->pic?>" width="300px">
            ไฟล์ภาพปัจจุบัน : <?=$rs->pic?>
        </div>
        <div>
            <label>อัพโหลดไฟล์</label>
            <input type="file" name="fileupload">
        </div>
        <div>
            <label>ประเภทสินค้า	</label>
            <select name="tTypeid">
                <?php
                    $sqlType = "SELECT * FROM tbtypeproduct";
                    $queryType = $conn->query($sqlType);
                    while ($rsType = $queryType->fetch_object()) {

                ?>
                    <option value="<?=$rsType->typeid?>"
                    <?php
                         if ($rs->typeid==$rsType->typeid){
                            echo "SELECTED";
                         }    
                    ?>
                    >
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

<?PHP
    if(isset($_REQUEST['bSubmit'])){
                //รับค่าจาก textbox
                $proname=$_REQUEST['tProname'];
                $price=$_REQUEST['tPrice'];
                $detail=$_REQUEST['tDetail'];
                $typeid=$_REQUEST['tTypeid'];
        
                //---------update Image-------
                //ฟังก์ชั่นวันที่
                date_default_timezone_set('Asia/Bangkok');
                $date = date("Ymd"); 
                //ฟังก์ชั่นสุ่มตัวเลข
                $numrand = (mt_rand());
                //โฟลเดอร์ที่จะ upload file เข้าไป 
                $path="img/";  
                //เอาชื่อไฟล์เก่าออกให้เหลือแต่นามสกุล
                $type = strrchr($_FILES['fileupload']['name'],".");
                //ตั้งชื่อไฟล์ใหม่โดยเอาเวลาไว้หน้าชื่อไฟล์เดิม
                $newname = $date.$numrand.$type;
                $path_copy=$path.$newname;
                $path_link="img/".$newname;
        
                if(empty($_FILES['fileupload']['tmp_name'])){
                    //echo"กรณีที่ผู้ใช้ไม่ได้เลือกไฟล์ภาพใด ๆ";
                    $sqlImage="SELECT * FROM tbproduct 
                        WHERE proid='$_REQUEST[id]' ";
                    $queryImage=$conn->query($sqlImage);
                    $resultImage=$queryImage->fetch_object();
                    $newname=$resultImage->pic;
                    //เขียนคำสั่ง Update ข้อมูลในตาราง
                    $sqlUpdate="UPDATE tbproduct
                        SET     proname='$proname',
                                price='$price',
                                detail='$detail',
                                pic='$newname',
                                typeid='$typeid'
                        WHERE proid='$_REQUEST[id]' ";
                }else{
                    //echo"กรณีที่ผู้ใช้เลือกไฟล์ภาพใดภาพหนึ่งเข้ามา";
                    if(move_uploaded_file($_FILES["fileupload"]["tmp_name"],$path_copy)){
                        //เขียนคำสั่ง Update ข้อมูลในตาราง
                        $sqlUpdate="UPDATE tbproduct
                                SET     proname='$proname',
                                        price='$price',
                                        detail='$detail',
                                        pic='$newname',
                                        typeid='$typeid'
                                WHERE proid='$_REQUEST[id]' ";
                    }//end of if
                }
        
                $queryUpdate=$conn->query(query: $sqlUpdate); 
                if($queryUpdate){ 
                    echo"<strong>แก้ไขข้อมูลสินค้าเรียบร้อย. </strong>";
                    echo "<META HTTP-EQUIV='refresh' 
                    CONTENT='0; URL=form_addProduct.php'>";  
                }
    }
?>