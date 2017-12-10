<?php
include 'db.php';
$cid = $_REQUEST['cid'];
$did = $_REQUEST['did'];
$mname = $_REQUEST['mname'];

$sql = "insert into teacher (cid,mname,did,mpass) values ('{$cid}','{$mname}','{$did}',md5(123456))";

$mysql->query($sql);

if($mysql->affected_rows){
    echo 'ok';
}else{
    echo 'error';
}

