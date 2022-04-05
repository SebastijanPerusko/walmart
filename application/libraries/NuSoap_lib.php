<?php

class NuSoap_lib{

    public function __construct(){
        require_once("lib/nusoap.php");
    }

    public function getWeather(){
        $client = new nusoap_client("https://graphical.weather.gov:443/xml/SOAP_server/ndfdXMLserver.php", false);

        $err = $client->getError();
        if ($err) {
            echo '<h2>Constructor error</h2><pre>' . $err . '</pre>';
            echo '<h2>Debug</h2><pre>' . htmlspecialchars($client->getDebug(), ENT_QUOTES) . '</pre>';
            exit();
        }

        $weatherParameters = array(
            'maxt' => "1" ,
            'mint' => "1" ,
            'temp' => "1" ,
            'dew' => "0" ,
            'pop12' => "0" ,
            'qpf' => "0" ,
            'sky' => "0" ,
            'snow' => "0" ,
            'wspd' => "0" ,
            'wdir' => "0" ,
            'wx' => "0" ,
            'waveh' => "0" ,
            'icons' => "1" ,
            'rh' => "0" ,
            'appt' => "0" ,
            'incw34' => "0" ,
            'incw50' => "0" ,
            'incw64' => "0" ,
            'cumw34' => "0" ,
            'cumw50' => "0" ,
            'cumw64' => "0" ,
            'critfireo' => "0" ,
            'dryfireo' => "0" ,
            'conhazo' => "0" ,
            'ptornado' => "0" ,
            'phail' => "0" ,
            'ptstmwinds' => "0" ,
            'pxtornado' => "0" ,
            'pxhail' => "0" ,
            'pxtstmwinds' => "0" ,
            'ptotsvrtstm' => "0" ,
            'pxtotsvrtstm' => "0" ,
            'tmpabv14d' => "0" ,
            'tmpblw14d' => "0" ,
            'tmpabv30d' => "0" ,
            'tmpblw30d' => "0" ,
            'tmpabv90d' => "0" ,
            'tmpblw90d' => "0" ,
            'prcpabv14d' => "0" ,
            'prcpblw14d' => "0" ,
            'prcpabv30d' => "0" ,
            'prcpblw30d' => "0" ,
            'prcpabv90d' => "0" ,
            'prcpblw90d' => "0" ,
            'precipa_r' => "0" ,
            'sky_r' => "0" ,
            'temp_r' => "0" ,
            'td_r' => "0" ,
            'wdir_r' => "0" ,
            'wspd_r' => "0" ,
            'wwa' => "0" ,
            'wgust' => "0" ,
            'iceaccum' => "0"
        );


        $params = array(
            'latitude' => "40.785091",
            'longitude'=> '-73.968285',
            'product'=> 'time-series',
            'startTime'=> '2021-01-06T00:00:00',
            'endTime'=> '2021-01-08T00:00:00',
            'Unit'=> 'm',
            'weatherParameters' => $weatherParameters
        );



        $result = $client->call('NDFDgen', $params, '', '');

        if ($client->fault) {
            echo '<h2>Fault (Expect - The request contains an invalid SOAP body)</h2><pre>'; print_r($result); echo '</pre>';
        } else {
            $err = $client->getError();
            if ($err) {
                echo '<h2>Error</h2><pre>' . $err . '</pre>';
            } else {
                echo '<h2>Result</h2><pre>'; print_r($result); echo '</pre>';
            }
        }
        echo '<h2>Request</h2><pre>' . htmlspecialchars($client->request, ENT_QUOTES) . '</pre>';
        echo '<h2>Response</h2><pre>' . htmlspecialchars($client->response, ENT_QUOTES) . '</pre>';
        echo '<h2>Debug</h2><pre>' . htmlspecialchars($client->getDebug(), ENT_QUOTES) . '</pre>';
    }

}
