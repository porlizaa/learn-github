<?PHP
    include"dbcon.php";

    $username=$_REQUEST['tUsername'];
    $password=$_REQUEST['tPassword'];
    echo $username;
    echo $password;

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
            }
    }
?>