<?php

use Hcode\PageAdmin;

$app->get('/admin/products',
    function()
    {
        $page = new PageAdmin();

        $page->setTpl('');
    }
);
?>