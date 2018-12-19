<?php

require_once 'helper/helper.php';

start_sess('gossip');
session_destroy();
header('location: signin.php');
exit;
