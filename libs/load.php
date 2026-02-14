<?php
require_once __DIR__ . '/includes_class/database.class.php';
require_once __DIR__ . '/includes_class/user.class.php';

global $_siteconfig;
$_siteconfig = file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/../accountsconfig.json');

function get_config($key, $default = null)
{
    global $_siteconfig;
    $cfg = json_decode($_siteconfig, true);
    return $cfg[$key] ?? $default;
}

function load_template($value)
{
    include $_SERVER['DOCUMENT_ROOT'] . "/accounts/_templates/$value.php";
}

public static function isLoggedIn(): bool
{
    return Session::isset('auth_user');
}
