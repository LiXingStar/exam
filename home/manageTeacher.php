<?php
 include 'db.php';

 $sql = "select teacher.*, direction.dname,classes.cname from teacher,direction,classes where teacher.did = direction.did and teacher.cid = classes.cid";

 $data = $mysql->query($sql)->fetch_all(MYSQLI_ASSOC);
 echo json_encode($data);
