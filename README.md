# Advcash API for Laravel by Volkan AYDIN

Hello, this plugin I developed for a project has the entire advcash library. But I will add facade support as I need it. The following functions are working.

## Install

    composer require volkandm/advcash

Edit your .env file add following variables;

    #VOLKANDM ADVCASH
    ADVCASH_API_NAME=YOUR_API_NAME
    ADVCASH_API_EMAIL=YOUR_API_EMAIL
    ADVCASH_API_PASS=YOUR_API_PASSWORD

## Examples

**Sending Money**

    $adv = new Volkandm\Advcash\Advcash();
    $adv->SendMoney(1, "email or walletid", "USD", "Payment Note");

You can use email or wallet id to sending money.

**_Response_**

    Array(
        "success" => 1 // if it's 0, transaction is failed
        "response" => "Error or success message"
    )
