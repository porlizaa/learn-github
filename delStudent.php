<?PHP
    include"dbcon.php";
    $id=$_REQUEST['id'];

    //echo $id;
    $sql="DELETE FROM tbstudent
            WHERE stdid='$id' ";
    $query=$conn->query($sql);

    if($query){
        echo"<strong>ลบข้อมูลเรียบร้อย. </strong>";
        echo "<META HTTP-EQUIV='refresh'CONTENT='3; URL=form_addStudent.php'>";  
    }else{
        echo"<strong>ลบข้อมูลไม่สำเร็จ !!!! </strong>";
        echo "<META HTTP-EQUIV='refresh'CONTENT='3; URL=form_addStudent.php'>";         
        }//end of if

?>