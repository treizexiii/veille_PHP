<?php

class Search
{

    public function getMarket($mySearch)
    {

        $postData = http_build_query(array('criterion' => $mySearch));

        $connexion = stream_context_create(array(
            'http' => array(
                'method' => 'GET',
                'header' => 'Accept: */*' . "\r\n",
            )
        ));

        $responce = file_get_contents('http://api.dila.fr/opendata/api-boamp/annonces/search?' . $postData, FALSE, $connexion);

        $responce = json_decode($responce, TRUE);

        if ($responce['nbItemsExistants'] > 1000) {
            $cursor = $responce['nbItemsExistants'] - 1000;
        } else {
            $cursor = 0;
        }

        $responce = file_get_contents('http://api.dila.fr/opendata/api-boamp/annonces/search?' . $postData . '&curseur=' . $cursor, FALSE, $connexion);
        if ($responce == false) {
            die('Error');
        }

        $responceData = json_decode($responce, TRUE);

        return $responceData['item'];
    }

    public function getVersion($mySearch)
    {
        $postData = $mySearch;

        $connexion = stream_context_create(array(
            'http' => array(
                'method' => 'GET',
                'header' => 'Accept: */*' . "\r\n",
            )
        ));

        $response = file_get_contents('http://api.dila.fr/opendata/api-boamp/annonces/v110/' . $postData, FALSE, $connexion);

        if($response==false){
            $response = file_get_contents('http://api.dila.fr/opendata/api-boamp/annonces/v010/' . $postData, FALSE, $connexion);
        }

        if($response==false){
            $response = file_get_contents('http://api.dila.fr/opendata/api-boamp/annonces/v230/' . $postData, FALSE, $connexion);
        }

        $tryData = json_decode($response);

        return $tryData;
    }

    public function seeMarket($mySearch, $version)
    {
        $postData = $mySearch;
        $versionData = $version;

        $connexion = stream_context_create(
            array(
                'http' => array(
                    'method' => 'GET',
                    'header' => 'Accept: */*' . "\r\n"
                )
            )
        );

        $response = file_get_contents('http://api.dila.fr/opendata/api-boamp/annonces/' . $versionData . '/' . $postData, FALSE, $connexion);

        if ($response == FALSE) {
            die('Error');
        }

        $responseData = json_decode($response);

        return $responseData;
    }
}
