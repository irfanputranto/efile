<?php
function login()
{
    $log = &get_instance();
    if (!$log->session->userdata('username')) {
        redirect('auth');
    }
}
// function not_login()
// {
//     $log = get_instance();
//     if ($log->session->userdata('username')) {
//         redirect('home');
//     }
// }
