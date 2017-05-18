<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>FORUM SYSTEM</title>
        <style>
            .liuyan{
                text-align: center;
            }
            .title{
                text-align: center;
            }
        </style>
    </head>
    <body>
        <div class="title"><a href="Example1_3.php">删除评论页</a><a href="Example1_2.php">所有评论页</a></div>
        <table border="0" width="75%" align="center">
            <caption>最新发表</caption>
            <?php
            $link=  mysql_connect("localhost","jyxu","qweasd1456");
            mysql_query("set names 'utf-8'");
            mysql_select_db("test2",$link);
            $sql_exec="select * from yan order by id DESC limit 3";
            $result=  mysql_query($sql_exec);
            while ($rs=mysql_fetch_object($result)){
                $id=$rs->id;
                $name=$rs->name;
                $title=$rs->title;
                $content=$rs->content;
                echo "<tr><td colspan=3><hr size='1' noshade='noshade' color='#00000'></td></tr>";
                echo "<td>".$name." 针对[".$title."]事件说：</td>";
                echo '<tr><td>'.$content."</td></tr>";
                
                       
                      
            }
            mysql_close();
            ?>
        </table>
        
        
        <h1 align="center" style="font-size: 13;color: #00cccc">说TMD说</h1>
        <div class="liuyan">
        <form action="Example1_1.php" method="post">
            <input type="checkbox" value="1" name="autoLogin">署名<br>
            姓名：<input name="author"><br>
            主题：<input maxlength="60" size="45" name="subject"><br>
            内容：<textarea name="body" rows="8" cols="6"></textarea><br>
            <input type="submit" value="提交" name="Login"><input type="reset" value="重置" name="again"><br>
        </form>
         </div>
        
    </body>
</html>
