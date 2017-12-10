<?php
 include 'db.php';
 $pname = $_REQUEST['pname'];
 $cid = $_REQUEST['cid'];
 session_start();
 $str = $_SESSION['user'];

 $sql = "insert into paper (pname,cid,author) values ('{$pname}','{$cid}','{$str}')";

 $mysql->query($sql);
 if($mysql->affected_rows){
     echo 'ok';
 }else{
     echo 'error';
 }