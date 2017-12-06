<?php
 include 'db.php';
 $cname = $_REQUEST['cname'];
 $mname = $_REQUEST['mname'];

 $sql = "insert into student (cname,mname,mpass) values ('{$cname}','{$mname}',md5(123456))";

 $mysql->query($sql);

 if($mysql->affected_rows){
     echo 'ok';
 }else{
     echo 'error';
 }

