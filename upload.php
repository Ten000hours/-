<?php

if ($_FILES["file"]["error"]>0) {
    echo "error:".$_FILES['file']['error']."<br>";
}else{
    echo 'upload:'.$_FILES["file"]["name"]."<br>";
    echo 'type:'.$_FILES["file"]["type"]."<br>";
    echo 'size:'.($_FILES["file"]["size"]/1024)."Kb<br>";
    echo 'stored in:'.$_FILES["file"]["tmp_name"];
    
}

