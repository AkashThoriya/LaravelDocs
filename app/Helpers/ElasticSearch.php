<?php


namespace App\Helpers;


class ElasticSearch
{
    public static function testQuery()
    {

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'http://localhost:9200/bank/_search');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');

        $city =
            [
                "match" =>
                    [
                        "city" => "Brogan"
                    ]
            ];

        $data = array(
            'query' =>
                [
                    'bool' =>
                        [
                            'must' =>
                                [
                                    [
                                        "match" =>
                                            [
                                                "state" => "IL"
                                            ]
                                    ]
                                ]
                        ]
                ]
        );

        $data['query']['bool']['must'][] = $city;

        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

        $headers = array();
        $headers[] = 'Content-Type: application/json';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);
        dd($result);
    }
}
