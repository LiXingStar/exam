<?php
  include 'db.php';
  /*
   *  未考
   *
   *  试卷
   *    姓名 -> 班级名   ->   cid -> paper
   *    user    cname
   *  考过
   *
   * */
  session_start();
  $cname = $_SESSION['cname'] ;
  $uid = $_SESSION['uid'];
  $sql = "select cid from classes where cname='{$cname}'";
  $cid = $mysql->query($sql)->fetch_assoc()['cid'];

  $sql1 = "select * from (select paper.* from paper where cid='{$cid}') as lx where pid not in (SELECT distinct pid from record where user=$uid)";

  $data = $mysql->query($sql1)->fetch_all(1);
  $result = [
      $data,$cname
  ];
  echo json_encode($result);