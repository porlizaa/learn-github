<?php
    include"dbcon.php";

    if(isset($_REQUEST['bSubmit'])){  //เช็คว่าปุ่ม bSumbit ถูกกดใช่หรือไม่
        $typename=$_REQUEST['typename'];

        //ฟังก์ชั่นวันที่
        date_default_timezone_set('Asia/Bangkok');
        $date = date("Ymd"); 
        //ฟังก์ชั่นสุ่มตัวเลข
        $numrand = (mt_rand());

            
        $sql="INSERT INTO tbtypeproduct
        VALUE(null,'$typename')";
        $query=mysqli_query($conn,$sql); 

        if($query){
            echo"<strong>บันทึกข้อมูลเรียบร้อย. </strong>";
            echo "<META HTTP-EQUIV='refresh'CONTENT='3; URL=form_addTypeproduct.php'>";  
        }else{
            echo"<strong>บันทึกข้อมูลไม่สำเร็จ !!!! </strong>";
            echo "<META HTTP-EQUIV='refresh'CONTENT='3; URL=form_addTypeproduct.php'>";         
            }//end of if
    }

?>