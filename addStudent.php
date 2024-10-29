<?php
    include"dbcon.php";

    if(isset($_REQUEST['bSubmit'])){  //เช็คว่าปุ่ม bSumbit ถูกกดใช่หรือไม่
        $firstname=$_REQUEST['tFirstname'];
        $lastname=$_REQUEST['tLastname'];
        $address=$_REQUEST['tAddress'];

        //ฟังก์ชั่นวันที่
        date_default_timezone_set('Asia/Bangkok');
        $date = date("Ymd"); 
        //ฟังก์ชั่นสุ่มตัวเลข
        $numrand = (mt_rand());

            
        $sql="INSERT INTO tbstudent
        VALUE(null,'$firstname','$lastname','$address')";
        $query=mysqli_query($conn,$sql); 

        if($query){
            echo"<strong>บันทึกข้อมูลเรียบร้อย. </strong>";
            echo "<META HTTP-EQUIV='refresh'CONTENT='3; URL=form_addStudent.php'>";  
        }else{
            echo"<strong>บันทึกข้อมูลไม่สำเร็จ !!!! </strong>";
            echo "<META HTTP-EQUIV='refresh'CONTENT='3; URL=form_addStudent.php'>";         
            }//end of if
    }

?>