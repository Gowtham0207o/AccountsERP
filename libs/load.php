<?php
require_once __DIR__ . '/includes_class/database.class.php';
require_once __DIR__ . '/includes_class/dbHelper.class.php';
require_once __DIR__ . '/includes_class/user.class.php';
require_once __DIR__ . '/includes_class/session.class.php';
require_once __DIR__ . '/includes_class/client.class.php';
require_once __DIR__ . '/includes_class/projects.class.php';

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
function isLoggedIn(): bool
{
    return Session::isset('auth_user');
}
