<?php

namespace Volkandm\Advcash;

class Advcash
{
    protected $apiName;
    protected $apiAccountEmail;
    protected $apiPassword;

    public function __construct()
    {
        $this->apiName = env("ADVCASH_API_NAME");
        $this->apiAccountEmail = env("ADVCASH_API_EMAIL");
        $this->apiPassword = env("ADVCASH_API_PASS");
    }

    public function auth()
    {
        $merchantWebService = new MerchantWebService();
        $arg0 = new authDTO();
        $arg0->apiName = $this->apiName;
        $arg0->accountEmail = $this->apiAccountEmail;
        $arg0->authenticationToken = $merchantWebService->getAuthenticationToken($this->apiPassword);
        return $arg0;
    }

    public function SendMoney($amount, $to, $currency = "USD", $note = "HireTalents Withdraw")
    {
        $merchantWebService = new MerchantWebService();
        $arg0 = $this->auth();
        dd($arg0);
        $arg1 = new sendMoneyRequest();
        $arg1->amount = $amount;
        $arg1->currency = $currency;
        if (strstr($to, "@")) {
            $arg1->email = $to;
        } else {
            $arg1->walletId = $to;
        }
        $arg1->note = $note;
        $arg1->savePaymentTemplate = false;
        $validationSendMoney = new validationSendMoney();
        $validationSendMoney->arg0 = $arg0;
        $validationSendMoney->arg1 = $arg1;

        $sendMoney = new sendMoney();
        $sendMoney->arg0 = $arg0;
        $sendMoney->arg1 = $arg1;

        try {
            $merchantWebService->validationSendMoney($validationSendMoney);
            $sendMoneyResponse = $merchantWebService->sendMoney($sendMoney);
            return [
                "success" => 1,
                "response" => print_r($sendMoneyResponse)
            ];
        } catch (\Exception $e) {
            return [
                "success" => 0,
                "response" => print_r($e->getMessage())
            ];
        }
    }
}
