<link rel="stylesheet" href="style.css">
<?php
    $conn=new mysqli();
    $conn->connect("localhost","root","","dbweb23");

    if($conn->connect_error){
        die($conn->connect_error);
    }
    $conn->set_charset("utf8");
    date_default_timezone_set('Asia/Bangkok');
?>

<div><h2>ทดสอบดึงข้อมูลจากฐานข้อมูลออกมาแสดงผลบนหน้าเว็บ</h2></div>

<?php
    $sql="SELECT * FROM tbstudent"; //เลือกทุก
    $query=$conn->query($sql);
    
        echo"<table border=1>
            <thead>
                <th>รหัส</th>
                <th>ชื่อ</th>
                <th>นามสกุล</th>
                <th>ที่อยู่</th>
            </thead>
            <tbody>";
        while($result=$query->fetch_object()){
            echo"<tr>
                    <td>{$result->stdid}</td>
                    <td>{$result->firstname}</td>
                    <td>{$result->lastname}</td>
                    <td>{$result->address}</td>
                </tr>";
        }   
        echo"</tbody></table>";
?>

