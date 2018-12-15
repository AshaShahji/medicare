<?php
namespace App;

class HelperClass
{

    function __construct()
    {

    }
    public function cURLToken($URL,$client_id,$secret, $data){
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/x-www-form-urlencoded',
                "accept: application/json"
            )
        );
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $URL,
            CURLOPT_POST => 1,
            CURLOPT_USERPWD => $client_id.":".$secret,
            CURLOPT_POSTFIELDS => http_build_query($data)
        ));
        $resp = curl_exec($curl);
        $err = curl_error($curl);
        if($err){
            die('Curl returned error: ' . $err);
        }
        curl_close($curl);
        $json_response = json_decode($resp);
        return $json_response->access_token;


    }

    public function cURLPostJson($URL,$data,$token){
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Authorization: Bearer '.$token
            )
        );
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $URL,
            CURLOPT_POST => 1,
            CURLOPT_POSTFIELDS => json_encode($data)
        ));
        $resp = curl_exec($curl);
        $err = curl_error($curl);
        if($err){
            die('Curl returned error: ' . $err);
        }
        curl_close($curl);

        return $resp;


    }

    public function cURLPostJson2($URL, $data,$token){
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Authorization: Bearer '.$token
            )
        );
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $URL,
            CURLOPT_POST => 1,
            CURLOPT_POSTFIELDS => json_encode($data)
        ));
        $resp = curl_exec($curl);
        $err = curl_error($curl);
        if($err){
            die('Curl returned error: ' . $err);
        }
        curl_close($curl);

        return $resp;


    }


}
