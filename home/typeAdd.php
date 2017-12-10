<?php
 include 'db.php';
 $name = $_REQUEST['name'];

 $sql = "insert into `type` (name) values ('{$name}')";

 $mysql->query($sql);

 if($mysql->affected_rows){
     echo 'ok';
 }else{
     echo 'error';
 }

