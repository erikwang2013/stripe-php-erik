<?php

require '../init.php';

Erikwang2013\Stripe\Stripe::setApiKey(\getenv('STRIPE_SECRET_KEY'));
Erikwang2013\Stripe\Stripe::setClientId(\getenv('STRIPE_CLIENT_ID'));

if (isset($_GET['code'])) {
    // The user was redirected back from the OAuth form with an authorization code.
    $code = $_GET['code'];

    try {
        $resp = Erikwang2013\Stripe\OAuth::token([
            'grant_type' => 'authorization_code',
            'code' => $code,
        ]);
    } catch (Erikwang2013\Stripe\Exception\OAuth\OAuthErrorException $e) {
        exit('Error: ' . $e->getMessage());
    }

    $accountId = $resp->stripe_user_id;

    echo "<p>Success! Account <code>{$accountId}</code> is connected.</p>\n";
    echo "<p>Click <a href=\"?deauth={$accountId}\">here</a> to disconnect the account.</p>\n";
} elseif (isset($_GET['error'])) {
    // The user was redirect back from the OAuth form with an error.
    $error = $_GET['error'];
    $error_description = $_GET['error_description'];

    echo '<p>Error: code=' . \htmlspecialchars($error, \ENT_QUOTES) . ', description=' . \htmlspecialchars($error_description, \ENT_QUOTES) . "</p>\n";
    echo "<p>Click <a href=\"?\">here</a> to restart the OAuth flow.</p>\n";
} elseif (isset($_GET['deauth'])) {
    // Deauthorization request
    $accountId = $_GET['deauth'];

    try {
        Erikwang2013\Stripe\OAuth::deauthorize([
            'stripe_user_id' => $accountId,
        ]);
    } catch (Erikwang2013\Stripe\Exception\OAuth\OAuthErrorException $e) {
        exit('Error: ' . $e->getMessage());
    }

    echo '<p>Success! Account <code>' . \htmlspecialchars($accountId, \ENT_QUOTES) . "</code> is disconnected.</p>\n";
    echo "<p>Click <a href=\"?\">here</a> to restart the OAuth flow.</p>\n";
} else {
    $url = Erikwang2013\Stripe\OAuth::authorizeUrl([
        'scope' => 'read_only',
    ]);
    echo "<a href=\"{$url}\">Connect with Stripe</a>\n";
}
