<?php

/*
* TruckersMP REST API Library
* Website: truckersmp.com
*/

namespace TruckersMP\API;

class APIClient
{
    //Connecting and loading stuff.
    private $baseurl = "https://api.truckersmp.com";

    private function getHTTP($in)
    {
        //Input: $http_response_header[0] - ALWAYS, when using file_get_contents().
        //Gets HTTP status code on the file_get_contents request.
        preg_match("#HTTP/[0-9\.]+\s+([0-9]+)#", $in, $out);
        return $out['1'];
    }

    private function load($endpoint)
    {
        if (isset($endpoint)) {
            $contentjson = file_get_contents($this->baseurl . $endpoint);
            if ($this->getHTTP($http_response_header[0]) == 200) {
                if ($content = json_decode($contentjson, true, 512, JSON_BIGINT_AS_STRING)) {
                    return $content;
                } else {
                    $r['error'] = true;
                    $r['response']['errortype'] = "API";
                    $r['response']['errordetails'] = "Response not JSON.";
                    return $r;
                }
            } else {
                $r['error'] = true;
                $r['response']['errortype'] = "HTTP";
                $r['response']['errordetails'] = stringval($this->getHTTP($http_response_header[0]));
                return $r;
            }
        }
    }

    //Specific endpoints.
    public function player($id)
    {
        $load = $this->load("/v2/player/" . $id);
        return $load;
    }

    public function bans($id)
    {
        $load = $this->load("/v2/bans/" . $id);
        return $load;
    }

    public function servers()
    {
        $load = $this->load("/v2/servers/");
        return $load;
    }

    public function gameTime()
    {
        $load = $this->load("/v2/game_time/");
        if ($load['error'] == false) {
            $load['minutes'] = $load['game_time'];

            $load['hours'] = $load['minutes'] / 60;
            $load['minutes'] = $load['minutes'] % 60;

            $load['days'] = $load['hours'] / 24;
            $load['hours'] = $load['hours'] % 24;

            $load['months'] = $load['days'] / 30;
            $load['days'] = $load['days'] % 30;

            $load['years'] = intval($load['months'] / 12);
            $load['months'] = $load['months'] % 12;
        }
        return $load;
    }

    public function version()
    {
        $load = $this->load("/v2/version/");
        return $load;
    }
}
