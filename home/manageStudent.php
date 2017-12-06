<?php
 include 'db.php';
 $sql = "select uid,mname,cname from student";
 $data = $mysql->query($sql)->fetch_all(MYSQLI_ASSOC);

 echo json_encode($data);
