<?php

 include 'db.php';

 $name = $_POST['name'];
 $pass = md5($_POST['pass']);
 $type = $_POST['type'];


 

 $sql = "select * from $type";
 

 $data = $mysql->query($sql)->fetch_all(MYSQLI_ASSOC);

 for($i=0;$i<count($data);$i++){
 	if($data[$i]['mname'] == $name){
       if($data[$i]['mpass'] == $pass){
       	  echo '1';
       	  exit();
       }else{
       	  echo "2";
       	  exit();
       }
 	}
 }
 echo '3';
