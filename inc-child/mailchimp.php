<?php

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

function mailchimp_add_member($list, $email)
{
    $url = 'lists/' . $list . '/members';
    $data = [
        'status'        => 'subscribed',
        'email_address' => $email,
    ];
    send_mailchimp_request($url, $data, 'post');
}

function mailchimp_delete_member($list, $email)
{
    $hash = md5(strtolower($email));
    $str = "lists/$list/members/$hash";
    send_mailchimp_request($str, [], 'delete');
}

function send_mailchimp_request($endpoint, $data = [], $method = 'post')
{
    $apikey = get_mailchimp_api_key();
    $auth = base64_encode('user:' . $apikey);
    $client = new Client();
    $domain = get_mailchimp_domain();
    $url = "https://$domain.api.mailchimp.com/3.0/$endpoint";
    try {
        $params = [
            'headers' => [
                'Authorization' => "Basic {$auth}",
                'Content-type'  => 'application/json',
            ],
        ];
        if (count($data)) {
            $params['json'] = $data;
        }
        $result = $client->request($method, $url, $params);

        $body = $result->getBody();

        return json_decode($body);
    } catch (GuzzleException $e) {
        error_log($e->getResponse()->getBody()->getContents());

        return false;
    }
}
