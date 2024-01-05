<?php


namespace App\Services;


class HumanticAi
{
    protected $url = 'https://api.humantic.ai/v1/';
    protected $action;

    private $accessToken;


    public function __construct()
    {
        $this->accessToken = config('humantic.api_key');
    }


    public function call()
    {
        try {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $this->url.$this->action);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt( $ch, CURLOPT_CUSTOMREQUEST, 'GET' );

/*            curl_setopt($ch, CURLOPT_HEADER , true);

            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'accept: application/json',
            ));*/

            if (curl_errno($ch)) {
                $error_msg = curl_error($ch);
            }

            if (isset($error_msg)) {
                dd($error_msg);
            }
            $server_output = curl_exec($ch);

            $statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

            curl_close($ch);

            return json_decode($server_output);
        } catch (Exception $e) {
            echo 'Caught exception: ', $e->getMessage(), "\n";
        }
    }

    public function createHumanticProfile($link)
    {
        $this->action = 'user-profile/create?apikey=' . $this->accessToken . '&id=' . $link;

        return $this->call();
    }

    public function fetchHumanticProfile($link)
    {
        $this->action = 'user-profile?apikey=' . $this->accessToken . '&id=' . $link . '/&persona=sales';

        return  $this->call();
    }
}
