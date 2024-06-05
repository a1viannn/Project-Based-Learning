<?php
namespace app\validator;
use GuzzleHttp\Client;

class ReCaptcha{
    public function validate($attribute, $value, $parameters, $validators){
        $client = new Client();
        $secret = config('services.recaptcha.secret');
        if (empty($secret)) {
            throw new \Exception('reCAPTCHA secret key is not set.');
        }
        $response = $client->post(
            'https://www.google.com/recaptcha/api/siteverify',
            [
                'form_params'=>[
                    'secret'=> config('services.recaptcha.secret'),
                    'response'=>$value,
                ],
        ],
    );
    $body = json_decode((string)$response->getBody());
    return $body->success;
    }
}
