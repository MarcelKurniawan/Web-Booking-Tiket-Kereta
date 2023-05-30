<?php
session_start();

//list user yang valid
//selain user ini tidak bisa login.
$list_user = [
    [
        'username' => 'admin1',
        'password' => 'admin1'
    ],
    [
        'username' => 'admin',
        'password' => 'admin'
    ]
];


$user = [
    'username' => $_POST['username'],
    'password' => $_POST['password'],
];


$not_found = false;

foreach ($list_user as $key => $registered_user) {

    //login success
    if ($registered_user['username'] == $user['username']) {

        if ($registered_user['password'] == $user['password']) {

            $_SESSION['login'] = true;
            $_SESSION['username'] =  $user['username'];
            $_SESSION['message']  = 'Berhasil login ke dalam sistem.';

            header("Location: index.php");
            break;
        } else {
            $_SESSION['error'] = 'Password anda salah';
            $not_found = true;
            header("Location: login.php");
        }
    } else {
        $_SESSION['error'] = 'Password anda salah';
        header("Location: login.php");
    }
}
if ($not_found == true) {
    header("Location: login.php");
}

