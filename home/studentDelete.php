<?php
include "db.php";
$did = $_REQUEST['ids'];
$str = implode(',',$did);

$sql = "delete from student where uid in ($str)";
$mysql->query($sql);

if ($mysql->affected_rows) {
    echo 'ok';
} else {
    echo 'error';
}