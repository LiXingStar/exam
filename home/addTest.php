<?php
 include 'db.php';
 $pid = $_REQUEST['pid'];
 $ids = $_REQUEST['ids'];

 $str = '';
 for($i=0;$i<count($ids);$i++){
     $str .= "(" .$pid ."," . $ids[$i] .") ,";
 }
 $str = substr($str,0,-1);

 $sql = "insert into paperextra (pid,tid) VALUES $str";

 $mysql->query($sql);
 echo $mysql->affected_rows;
