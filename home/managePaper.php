<?php
 include 'db.php';
 $sql = "select paper.*,classes.cname from paper,classes where paper.cid=classes.cid";
 $data = $mysql->query($sql)->fetch_all(MYSQLI_ASSOC);

 echo json_encode($data);
