<?php

function dump($val)
{
    echo '<pre>';
    var_dump($val);
    echo '</pre>';
}

function dump_s($val)
{
    echo '<pre>';
    var_dump($val);
    echo '</pre>';
    die();
}

function pr($val)
{
    echo '<pre>';
    print_r($val);
    echo '</pre>';
}

function pr_s($val)
{
    echo '<pre>';
    print_r($val);
    echo '</pre>';
    die();
}
