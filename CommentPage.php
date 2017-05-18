<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>CommentPage</title>
        <style>
            body{text-align: center;}
            table{text-align: center;}
        </style>
    </head>
    <body>
        <div><h3><a href="index.php">发布评论</a>&nbsp;&nbsp;&nbsp;
            <a href="index.php">退出系统</a>&nbsp;&nbsp;</h3></div>
        
        <h2>留言信息：</h2>
        <table align="center" >
            <tr>
                <td>发送人</td>
                <td>接收人</td>
                <td>发送时间</td>
                <td>评论内容</td>
            </tr>
        </table>
       
        <?php
        session_start();
        if (empty($_SESSION["name"])) {
            header("location:index.php");
        }
        $user=$_SESSION["name"];//"sldi";
        include ("DADB.php");
        $db=new DADB();
        $sql="select * from blog where receiver='$user'";
        
        $arr=$db->query($sql);
        
        while ($Row=  mysql_fetch_assoc($arr)){
            // $fjr=uname($v[1]);
           // $jsr=uname($v[2]);
           
            echo"<tr>
            <td>{$Row['sender']}&nbsp;&nbsp;</td> 
            <td>{$Row['receiver']}&nbsp;&nbsp;</td>
            <td>{$Row['time']}&nbsp;&nbsp;  </td>
            <td>{$Row['content']}&nbsp;&nbsp;</td>
        </tr>";
        }
        
        function uname($user)   //运用了uname方法
    {
        global $db;      //要想方法里面也可以用$db 这里用了全局变量
        if($user=="all")
       {
        return "所有人";
       }else
    {
        $sql1="select name from users where username=$user";
        $att=$db->Query($sql1);
        return $att[0][0];}
    }
        ?>
    </body>
</html>
