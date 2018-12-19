<?php

require_once 'helper/helper.php';
start_sess('gossip');


if (!u_verify()) {

    header('location: signin.php');
    exit;
}

$sm = '';
$ptid = trim(filter_input(INPUT_GET, 'ptid', FILTER_SANITIZE_STRING));

if ($ptid && is_numeric($ptid)) {

    $uid = $_SESSION['user_id'];
    $link = mysqli_connect(MYSQL_HOST, MYSQL_USER, MYSQL_PASS, MYSQL_DB);
    $ptid = mysqli_real_escape_string($link, $ptid);
    $sql = "DELETE FROM post WHERE id = $ptid AND user_id = $uid";
    $res = mysqli_query($link, $sql);

    if ($res && mysqli_affected_rows($link) == 1) {

        $sm = '?sm=Post deleted';
    }
}

header('location: blog.php' . $sm);
exit;
