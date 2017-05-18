<style>
    .table{text-align: center;}
    .biaoqian{text-align: center;}
</style>
<div class="table">
<table align="center"><th>姓名</th><th>主题</th><th>内容</th>

<?php
 
//
$link=  mysql_connect("localhost","jyxu","qweasd1456");
mysql_query("set names 'utf-8'");
mysql_select_db("test2");
if (isset($_GET['page'])) {
    $page=  intval($_GET['page']);
}else{
    $page=1;
    
}
$page_size=3;
$sql="select count(*) from yan";
$result=  mysql_query($sql);
$row=  mysql_fetch_row($result);
$amount=$row[0];
echo "共有：".$amount."记录&nbsp;&nbsp;";
if ($amount) {
    if ($amount<$page_size) {
        $page_count=1;
    }
    if ($amount%$page_size) {
        $page_count=($amount/$page_size)+1;
    }else{
        $page_count=$amount/$page_size;
    }
}else{
    $page_count=0;
}

?>
    <?php 
if ($amount) {
    $sql="select * from yan limit ".($page-1)*$page_size.", $page_size";
    $result=  mysql_query($sql);
    $num=  mysql_num_rows($result);
    echo '当前页面有'.$num."记录<br>";
    for ($i=0;$i<$num;$i++){
        $rs=  mysql_fetch_object($result);
        $id=$rs->id;
        $name=$rs->name;
        $title=$rs->title;
        $content=$rs->content;
        echo "<tr align='center'><td>".$name."</td><td>".$title."</td><td>".$content."</td></tr>";
    }
}else{
    echo '没有记录';
}
    


    ?>
</table>

<?php 
    $page_string="";
    if ($page==1) {
     $page_string.='第一页|上一页|';
     
}else{
    $page_string.='<a href=?page=1>第一页</a>|<a href=?page='.($page-1).'>上一页</a>|';
    
}
if ($page==$page_count||$page_count==0) {
    $page_string.="下一页|尾页";
}
else{
    $page_string.='<a href=?page='.($page+1).'>下一页<a href=?page='.$page_count.'>尾页</a>';
    
}echo "<br>".$page_string;

?></div>
<div class="biaoqian"><a href="Example1.php">回到主页</a></div>
