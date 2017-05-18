

<?php
$id=$_POST['de'];
echo $id;
$link=  mysql_connect("localhost","jyxu","qweasd1456");
mysql_select_db("test2");
$dele="delete from yan where id=$id";
$result=  mysql_query($dele);
if (mysql_affected_rows()==0||  mysql_affected_rows()==-1) {
    echo '没有找到记录，或出错';
    exit();
}
else{
    echo "言论" .$id ."已被删除";
    
}
mysql_close();
echo "<script language='javascript'>window.alert('言论删除成功，返回首页')</script>";
echo "<script language='javascript'>window.location='Example1_3.php'</script>";