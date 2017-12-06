<?php
 include 'db.php';
 $dname = $_REQUEST['dname'];

 $sql = "insert into direction (dname) values ('{$dname}')";

 $mysql->query($sql);

 if($mysql->affected_rows){
     echo 'ok';
 }else{
     echo 'error';
 }

