<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>注册测试页</title>
        <style>
            body{text-align: center;}
            h1{text-align: center;}
        </style>
    </head>
    <h1>注册测试结果</h1>
    <body>
        <?php
//       if (isset($_POST["submit"])&&$_POST["submit"]=="注册") {
//           $name=$_POST["username"];
//           $password=$_POST["password"];
//           $encry_password=  md5($password);
//           $confirm_password=$_POST["confirm_password"];
//           if ($name==""||$password==""||$confirm_password=="") {
//               echo "信息不完整";
//               header("refresh:2;URL=register.html");
//           }else{
//               if ($password==$confirm_password) {
//                  $con= mysql_connect("localhost", "jyxu", "qweasd1456");
//                   if (!$con) {
//                        die('could not connnect'.mysql_error());
//                               } 
//                    mysql_select_db("test2",$con);
//                    $results1=  mysql_query("select * from users where (username=$name) and (passwd=$encry_password)");
//                    if (mysql_num_rows($results1)) {
//                        echo 'user already existed';
//                    }else{
//                        $sql="insert into users(username,passwd)values('$name','$encry_password')";
//                        $res_sql= mysql_query($sql);
//                        if ($res_sql) {
//                            echo "注册成功";
//                            header("Refresh:2; URL=index.php");
//                        }else{
//                            echo '注册失败';
//                            header("refresh:2;url=register.html");
//                        }
//                    }
//               }
//           }
//       }else{
//           echo "cuo wu";
//       }
        ?>
        <?php
        echo $_POST["username"].$_POST["password"].$_POST["confirm"];
       //if(isset($_POST["Submit"]) && $_POST["Submit"] == "注册")
	//{
		$user = $_POST["username"];
		$psw = $_POST["password"];
		$psw_confirm = $_POST["confirm"];
		if($user == "" || $psw == "" || $psw_confirm == "")
		{
			echo "<script>alert('请确认信息完整性！'); history.go(-1);</script>";
		}
		else
		{
			if($psw == $psw_confirm)
			{
				mysql_connect("localhost","jyxu","qweasd1456");	//连接数据库
				mysql_select_db("test2");	//选择数据库
				mysql_query("set names 'gdk'");	//设定字符集
				$sql = "select username from users where username = '$_POST[username]'";	//SQL语句
				$result = mysql_query($sql);	//执行SQL语句
				$num = mysql_num_rows($result);	//统计执行结果影响的行数
				if($num)	//如果已经存在该用户
				{
					echo "<script>alert('用户名已存在'); history.go(-1);</script>";
				}
				else	//不存在当前注册用户名称
				{
					$sql_insert = "insert into users (username,passwd) values('$_POST[username]','$_POST[password]')";
					$res_insert = mysql_query($sql_insert);
					//$num_insert = mysql_num_rows($res_insert);
					if($res_insert)
					{
						echo "<script>alert('注册成功！'); history.go(-1);</script>";
					}
					else
					{
						echo "<script>alert('系统繁忙，请稍候！'); history.go(-1);</script>";
					}
				}
			}
			else
			{
				echo "<script>alert('密码不一致！'); history.go(-1);</script>";
			}
		}
	//}
//	else
//	{
//		echo "<script>alert('提交未成功！'); history.go(-1);</script>";
//	}

       
         ?>
    </body>
</html>
