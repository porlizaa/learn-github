<?PHP
    include"dbcon.php";
    $id=$_REQUEST['id'];

    //echo $id;
    $sql="DELETE FROM tbproduct
            WHERE proid='$id' ";
    $query=$conn->query($sql);

    if($query){
        echo"<strong>ลบข้อมูลเรียบร้อย. </strong>";
        echo "<META HTTP-EQUIV='refresh'CONTENT='3; URL=form_addProduct.php'>";  
    }else{
        echo"<strong>ลบข้อมูลไม่สำเร็จ !!!! </strong>";
        echo "<META HTTP-EQUIV='refresh'CONTENT='3; URL=form_addProduct.php'>";         
        }//end of if

?>