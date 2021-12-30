<?php

use Hcode\User;

require_once('vendor/autoload.php');

$p = new User;

$p->loadById(1);

echo $p;

?>