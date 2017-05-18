<?php
$auto=$_POST['autoLogin'];
$name=$_POST['author'];
$title=$_POST['subject'];
$content=$_POST['body'];

if ($auto) {
    if ($name==""||$title==""||$content=="") {
        echo "<script>alert('信息不完整'); history.go(-1);</script>";
      
    }
    $sql="insert into yan(name,title,content)values('$name','$title','$content')";
    $link=  mysql_connect("localhost","jyxu","qweasd1456");
            mysql_query("set names 'utf-8'");
            mysql_select_db("test2",$link);
            $results=  mysql_query($sql);
            if ($results) {
                echo '信息已添加';
            }else{
                echo '信息没添加';
            }
            mysql_close();
            echo "<script language='javascript'>window.alert('提交成功')</script>";
}else{
    if ($name=="") {
        $tem=rand(1,1000);
        $name="访客: ".$tem;
    }
    if ($title==""||$content=="") {
        echo"error";
    }
    $sql2="insert into yan(name,title,content)values('$name','$title','$content')";
    $link=  mysql_connect("localhost","jyxu","qweasd1456");
            mysql_query("set names 'utf-8'");
            mysql_select_db("test2",$link);
            $results=  mysql_query($sql2);
            if ($results) {
                echo '信息已添加';
            }else{
                echo '信息没添加';
            }
            mysql_close();
            echo "<script language='javascript'>window.alert('提交成功')</script>";
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

