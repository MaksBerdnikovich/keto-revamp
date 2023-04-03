<?php

function send_mail($email, $content, $subject, $data)
{
    $headers = ['Content-Type: text/html; charset=UTF-8'];

    foreach ($data as $key => $value) {
        $content = str_replace($key, $value, $content);
    }

    $message = get_email_template('default', $subject, [
        'content' => $content,
    ]);
    wp_mail($email, $subject, $message, $headers);
}

function get_email_template($template, $title, $data)
{
    ob_start();
    get_template_part('email-templates/base-template', null, [
        'template' => $template,
        'title'    => $title,
        'data'     => $data,
    ]);
    $email = ob_get_contents();
    ob_end_clean();

    return $email;
}

add_filter( 'password_change_email', 'filter_function_name_8943', 10, 3 );
function filter_function_name_8943( $pass_change_email, $user, $userdata ){
    $data = [
        'PARAM_1' => $user['user_login'],
        'PARAM_2' => $user['user_email'],
    ];

    $send = get_email_password_changed_template();
    $subject = get_email_password_changed_subject();
    foreach ($data as $key => $value) {
        $send = str_replace($key, $value, $send);
    }

    $pass_change_email['message'] = get_email_template('default', $subject, [
        'content' => $send,
    ]);

    $pass_change_email['headers'] = ['Content-Type: text/html; charset=UTF-8'];

    return $pass_change_email;
}