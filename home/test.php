<?php
 include 'db.php';
 $sql = "select question.*,stage.sname from question,stage where question.sid=stage.sid";
 $data = $mysql->query($sql)->fetch_all(MYSQLI_ASSOC);

 echo json_encode($data);
