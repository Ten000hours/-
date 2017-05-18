<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DADB
 *
 * @author Jiuyun XU
 */  
           
class DADB {
     

    //主机
    private $host="localhost";
    //数据库的username
    private $name="jyxu";
    //数据库的password
    private $pass="qweasd1456";
    //数据库名称
    private $table="test2";
    


    //构造函数
    function __construct(){
       
        $this->connect();

    }

    //数据库的链接
    function connect(){
        $link=mysql_connect($this->host,$this->name,$this->pass) or die ($this->error());
        mysql_select_db($this->table,$link) or die("没该数据库：".$this->table);
       
    }

    function  query1($sql,$key){
        $this->connect();
        $array=mysql_query($sql);
        $results=  mysql_fetch_row($array);
        for ($index = 0; $index < count($array); $index++) {
            echo $results[$index];
        }
    }
            function query($sql) {
        if(!($query = mysql_query($sql))) {$this->show('Say:', $sql);}
        return $query;
    }

    function show($message = '', $sql = '') {
        if(!$sql) echo $message;
        else echo $message.'<br>'.$sql;
    }

    function affected_rows() {
        return mysql_affected_rows();
    }

    function result($query, $row) {
        return mysql_result($query, $row);
    }

    function num_rows($query) {
        return @mysql_num_rows($query);
    }

    function num_fields($query) {
        return mysql_num_fields($query);
    }

    function free_result($query) {
        return mysql_free_result($query);
    }

    function insert_id() {
        return mysql_insert_id();
    }

    function fetch_row($query) {
        return mysql_fetch_row($query);
    }

    function version() {
        return mysql_get_server_info();
    }

    function close() {
        return mysql_close();
    }

    //向$table表中插入值
    function fn_insert($table,$name,$value){
        $this->query("insert into $table ($name) value ($value)");
    }
    //根据$id值删除表$table中的一条记录
    function fn_delete($table,$id,$value){
        $this->query("delete from $table where $id=$value");
        echo "id为". $id." 的记录被成功删除!";
    }
}


            






