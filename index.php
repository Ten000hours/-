<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
//
//       $name= $_POST["username"];
//       
//      $pass= $_POST["email"];
//      $pass1= md5($pass);
//      $con= mysqli_connect("localhost", "jyxu", "qweasd1456","test2");
//      if (!$con) {
//          die('could not connnect'.mysql_error());
//      }
//      
//     
//      
//      $sql1="select * from users where username='$_POST[username]' and passwd='$_POST[email]'";
//      echo $sql1;
//      $set=  mysqli_query($con, $sql1);
//      
//      $row= mysqli_num_rows($set);
//      
//      if ($row>0) {
//         
//         echo 'login well';
//        $_SESSION["name"]=$name;
//         header("Location:CommentPage.php");
//      }else{
//          echo 'login failed ';
//          
//        // header("Refresh:2; URL=FormPost.html ");
//      }
//      
//      mysqli_close($con);
//       
//
//
//
//        
//        
        
        ?>
<?php 
                $user = $_POST["username"];
		$psw = $_POST["password"];
		if($user == "" || $psw == "")
		{
			echo "<script>alert('请输入用户名或密码！'); history.go(-1);</script>";
		}
		else
		{
			mysql_connect("localhost","jyxu","qweasd1456");
			mysql_select_db("test2");
			mysql_query("set names 'gbk'");
			$sql = "select username,passwd from user where username = '$_POST[username]' and passwd = '$_POST[password]'";
			$result = mysql_query($sql);
			$num = mysql_num_rows($result);
			if($num)
			{
				$row = mysql_fetch_array($result);	//将数据以索引方式储存在数组中
				echo $row[0];
			}
			else
			{
				echo "<script>alert('用户名或密码不正确！');history.go(-1);</script>";
			}
		}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>this is a first demo</title>
        <style>
            body{text-align: center;}
            h1{text-align: center;}
        </style>
    </head>
    <body>
        
        
        
      
    </body>
</html>
