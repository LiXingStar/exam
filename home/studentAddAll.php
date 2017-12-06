<?php
 include 'db.php';
 $data = $_REQUEST['data'];
 /*
  *  [
  *   [a,b]
  * ]
  *
  * */
 $str = "(";
 for($i=0;$i<count($data);$i++){
     for($j=0;$j<count($data[$i]);$j++){
         $str .= "'{$data[$i][$j]}',";
     }
     $str.="'".md5(12345)."'";
     $str.=') ,(';
 }
 $str = substr($str,0,-2);

 /*
  *  ('张三','wuif1707-1') , ('张三','wuif1707-1')
  *
  * */

 $sql = "insert into student (mname,cname,mpass) values $str";

 $mysql->query($sql);


 if($mysql->affected_rows){
     echo 'ok';
 }else{
     echo 'error';
 }

