<?php

use GuzzleHttp\Client;

function complete_order_postback($order_id)
{
    if (! $order_id) {
        return;
    }
    $order = wc_get_order($order_id);
    if ($order->has_status('completed')) {
        //send volume postback
        send_voluum_postback($order);
    }
}

function send_voluum_postback($order)
{
    $customerId = $order->get_customer_id();
    $cid = get_field('voluum_cid', 'user_' . $customerId);
    if (! $cid) {
        return;
    }
    $items = $order->get_items();
    foreach ($items as $item) {
        $productId = $item->get_product_id();
        $voluumKey = get_field('voluum_key', $productId);
        $voluumPayout = get_field('voluum_payout', $productId);
        if ($voluumKey && $voluumPayout) {
            $url = "https://offers.theketoprogram.com/postback?cid=$cid&payout=$voluumPayout&txid=$voluumKey";
            $client = new Client();
            try {
                $client->post($url);
            } catch (\GuzzleHttp\Exception\GuzzleException $e) {
                error_log($e->getMessage());
            }
        }
    }
}

add_action('woocommerce_order_status_completed', 'complete_order_postback');

function save_voluum_cid()
{
    if (isset($_GET['cid'])) {
        set_keto_session('voluum_cid', $_GET['cid']);
    }
}

add_action('init', 'save_voluum_cid');