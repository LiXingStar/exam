<?php

include 'db.php';

$name = $_POST['name'];
$pass = md5($_POST['pass']);
$type = $_POST['type'];
session_start();
$sql = "select * from $type";


$data = $mysql->query($sql)->fetch_all(MYSQLI_ASSOC);

for ($i = 0; $i < count($data); $i++) {
    if ($data[$i]['mname'] == $name) {
        if ($data[$i]['mpass'] == $pass) {
            echo '1';
            $_SESSION['user'] = $name;
            if($type == 'student'){
                $_SESSION['uid'] = $data[$i]['uid'];
                $_SESSION['cname'] = $data[$i]['cname'];
            }

            exit();
        } else {
            echo "2";
            exit();
        }
    }
}
echo '3';
