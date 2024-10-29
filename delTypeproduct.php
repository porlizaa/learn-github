<?PHP
    include"dbcon.php";
    $id=$_REQUEST['id'];

    //echo $id;
    $sql="DELETE FROM tbtypeproduct
            WHERE typeid='$id' ";
    $query=$conn->query($sql);

    if($query){
        echo"<strong>ลบข้อมูลเรียบร้อย. </strong>";
        echo "<META HTTP-EQUIV='refresh'CONTENT='3; URL=form_addTypeproduct.php'>";  
    }else{
        echo"<strong>ลบข้อมูลไม่สำเร็จ !!!! </strong>";
        echo "<META HTTP-EQUIV='refresh'CONTENT='3; URL=form_addTypeproduct.php'>";         
        }//end of if

?>