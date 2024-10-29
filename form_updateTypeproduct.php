<link rel="stylesheet" href="style.css">
<?PHP 
    include"dbcon.php"; 
    include"topmenu.php";

    //echo $_REQUEST['id'];
    $sql="SELECT * FROM tbtypeproduct
        WHERE typeid='$_REQUEST[id]' ";
    $query=$conn->query($sql);
    $rs=$query->fetch_object();
?>

<div><h2>แก้ไขข้อมูลประเภทสินค้า</h2></div>
<div class="divrow">
    <form action="" method="post">
        <div>
            <label>ประเภทสินค้า</label>
            <input type="text" name="typename" value="<?=$rs->typename?>" required>
        </div>
        <div>
            <input type="submit" name="bSubmit" value="บันทึกข้อมูล">
        </div>
    </form>
</div>
<?PHP
    if(isset($_REQUEST['bSubmit'])) {
        $sqlUpdate="UPDATE tbtypeproduct
            SET typename='$_REQUEST[typename]'
            WHERE typeid='$_REQUEST[id]' ";
        $queryUpdate=$conn->query($sqlUpdate);
        if($queryUpdate){
            echo "<strong>แก้ไขข้อมูลประเภทเรียบร้อย. </strong>";
            echo "<META HTTP-EQUIV='refresh'CONTENT='0; URL=form_addTypeproduct.php'>";
        }
    }
?>