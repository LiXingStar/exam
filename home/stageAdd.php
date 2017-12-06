<?php
 include 'db.php';
 $sname = $_REQUEST['sname'];
 $did = $_REQUEST['did'];

 $sql = "insert into stage (sname,did) values ('{$sname}',$did)";

 $mysql->query($sql);

 if($mysql->affected_rows){
     echo 'ok';
 }else{
     echo 'error';
 }

