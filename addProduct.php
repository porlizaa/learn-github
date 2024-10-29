<?php
    include"dbcon.php";

    if(isset($_REQUEST['bSubmit'])){
        $proname=$_REQUEST['tProname'];
        $price=$_REQUEST['tPrice'];
        $detail=$_REQUEST['tDetail'];
        $typeid=$_REQUEST['tTypeid'];


        date_default_timezone_set('Asia/Bangkok');
        $date = date("Ymd"); 

        $numrand = (mt_rand());

        $path="img/";  

        $type = strrchr($_FILES['fileupload']['name'],".");

        $newname = $date.$numrand.$type;
        $path_copy=$path.$newname;
        $path_link="img/".$newname;

            if(move_uploaded_file($_FILES["fileupload"]["tmp_name"],$path_copy)){
                    $sql="INSERT INTO tbproduct
                    VALUE(null,'$proname','$price','$detail','$newname','$typeid')";
                    $query=mysqli_query($conn,$sql); 

                    if($query){
                            echo"<strong>บันทึกข้อมูลเรียบร้อย. </strong>";
                            echo "<META HTTP-EQUIV='refresh' 
                            CONTENT='3; URL=form_addProduct.php'>";  
                    }else{
                            echo"<strong>บันทึกข้อมูลไม่สำเร็จ !!!! </strong>";
                            echo "<META HTTP-EQUIV='refresh' 
                            CONTENT='3; URL=form_addProduct.php'>"; 
                    }  
            }//end of if
    }

?>