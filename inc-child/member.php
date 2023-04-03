<?php

function try_to_login()
{
    $username = $_POST['e'];
    $password = $_POST['pass'];

    $auth = wp_authenticate($username, $password);

    if (is_wp_error($auth)) {
        return [
            'success' => false,
            'message' => $auth->get_error_message(),
        ];
    } else {
        wp_set_auth_cookie($auth->ID);

        return [
            'message' => 'Success',
            'success' => true,
        ];
    }
}

function try_to_reset_password()
{
    $email = $_POST['e'];
    if (! $email || ! is_email($email)) {
        return [
            'success' => false,
            'message' => "Enter valid email",
        ];
    }
    $user = get_user_by('email', $email);
    if (! $user) {
        return [
            'success' => false,
            'message' => "User not found",
        ];
    }

    $password = wp_generate_password();

    wp_update_user([
        'ID'        => $user->ID,
        'user_pass' => $password,
    ]);

    send_mail($email, get_email_password_reset_template(), get_email_password_reset_subject(), [
        'PARAM_1' => $password,
    ]);

    return [
        'success' => true,
        'message' => "Email with new password was sent",
    ];
}

add_filter('lostpassword_url', 'wdm_lostpassword_url', 10, 0);
function wdm_lostpassword_url()
{
    return home_url('reset-password');
}

