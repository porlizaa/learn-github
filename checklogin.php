<?PHP
    include"dbcon.php";

    $username=$_REQUEST['tUsername'];
    $password=$_REQUEST['tPassword'];

        $sql="SELECT * FROM tbuser";
        $query=$conn->query($sql);
        while($rs=$query->fetch_object()){
            if($rs->username==$username && $rs->password==$password){
                session_start();
                $_SESSION['userid']=$rs->userid;
                $_SESSION['username']=$rs->username;
                $_SESSION['firstname']=$rs->firstname;
                $_SESSION['lastname']=$rs->lastname;
                $_SESSION['status']=$rs->status;
                if($rs->status=="staff"){
                    echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=form_addProduct.php'> ";
                }else{
                    echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=form_addProduct.php'> ";
                }
            }
    }
?>