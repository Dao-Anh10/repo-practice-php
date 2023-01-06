<?php

function getInfoDb()
{
    $conf = array(
        'db' => array(
            'user' => 'anhdaohoang1',
            'password' => 'pass1',
            'database' => 'Task',
        )
    );
    return $conf;
}

function startSession()
{
    if (empty($_SESSION)) {
        session_start();
    }

    if (!isset($_SESSION['start_time'])) {
        $_SESSION['start_time'] = $_SERVER['REQUEST_TIME'];
    }

    if ((time() - $_SESSION['start_time']) > (60 * 15)) {
        session_destroy();
        header("location:http://training.local/admin/user/open-form-login/0/Session Timeout");
    }
}

function isLogined()
{
    return isset($_SESSION['userDB']) ? true : false;
}
