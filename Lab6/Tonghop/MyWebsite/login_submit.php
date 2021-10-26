<?php
session_start();
include("includes/connect.php");
    if(isset($_POST["submit"]) && $_POST["username"] !='' && $_POST["password"]!=''){

        $username= $_POST["username"];
        $password=$_POST["password"];
        $sql= "SELECT * FROM user WHERE username='$username' AND password='$password'";
        $user = mysqli_query($mysqli,$sql);
        if(mysqli_num_rows($user)==1){
            	
						echo "
                        <script language='javascript'>
                            alert('Đăng nhập thành công');
                            window.open('index.php','_self', 1);
                        </script>
                    ";
            $_SESSION["username"]=$username;
        }else{
            echo "
            <script language='javascript'>
                alert('Đăng nhập k thành công');
                window.open('login.php','_self', 1);
            </script>
        ";
        }
    }else{
        header("location: login.php");
    }
?>