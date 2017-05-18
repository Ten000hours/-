<style>
    .biaoqian{text-align: center;}
</style>

<table border="1" width="60%" align="center">
    <caption>言论表</caption>
    <th>发表人</th><th>主题</th><th>内容</th><th>操作</th>
<?php
$link = mysql_connect("localhost", "jyxu", "qweasd1456");

mysql_select_db("test2", $link);
$sql_del = "select * from yan";
$results = mysql_query($sql_del);
while ($row = mysql_fetch_object($results)) {
    $id = $row->id;
    $name = $row->name;
    $content = $row->content;
    $title = $row->title;
    

?>




<tr>
    <td><?php echo $name?>  </td>
    <td><?php echo $title?> </td>
    <td><?php echo $content?> </td>
    <td><form action="Example1_4.php" method="post">
                    <input type="hidden" name="de" value="<?php echo $id;?>">
                    <input type="submit" value="删除">
        </form></td>
</tr>
<?php } mysql_close();?>

</table>
<div class="biaoqian"><a href="Example1.php">回到主页</a></div>