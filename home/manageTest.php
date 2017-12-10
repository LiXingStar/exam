<?php
 include 'db.php';
 $sql = "select test.* , type.name,stage.sname from test,type,stage where test.type=type.id and test.sid=stage.sid";
 $data = $mysql->query($sql)->fetch_all(MYSQLI_ASSOC);

 echo json_encode($data);
