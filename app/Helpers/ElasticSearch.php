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
        dd($data);

        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

        $headers = array();
        $headers[] = 'Content-Type: application/json';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);
        return $result;
    }

    public static function advanceSearch()
    {

        $data = array(
            'from' => 0,
            'size' => 10,
            '_source' => [
                'includes' => ["appellant","respondent","judgementdate","courttitle"]
            ],
            'query' =>
                [
                    'bool' =>
                        [
                            'must' =>
                                [

                                ],

                            'filter' =>
                                [

                                ]
                        ]
                ]
        );
        $range =
                [
                    'range' =>
                        [
                            'judgementdate' =>
                                [
                                    'lte' => $lte
                                ]
                        ]
                ];
        if((!(empty($gte))))
        {
            $range =
            [
                'range' =>
                    [
                        'judgementdate' =>
                            [
                                'lte' => $lte,
                                'gte' => $gte
                            ]
                    ]
            ];
        }

        $data['query']['bool']['filter'][] = $range;

        $judtext =
        [
            'match' =>
                [
                    'judtext' => $request->judtext
                ]
        ];

        (!(empty($request->judtext))) ? $data['query']['bool']['must'][] = $judtext : '';

        $appellant =
        [
            'match' =>
                [
                    'appellant' => $request->appellant
                ]
        ];

        (!(empty($request->appellant))) ? $data['query']['bool']['must'][] = $appellant : '';

        $respondent =
        [
            'match' =>
                [
                    'respondent' => $request->respondent
                ]
        ];

        (!(empty($request->respondent))) ? $data['query']['bool']['must'][] = $respondent : '';

        $judge =
        [
            'match' =>
                [
                    'judge' => $request->judge
                ]
        ];

        (!(empty($request->judge))) ? $data['query']['bool']['must'][] = $judge : '';

        $result =
        [
            'match' =>
                [
                    'result' => $request->result
                ]
        ];

        (!(empty($request->result))) ? $data['query']['bool']['must'][] = $result : '';

        $casetype =
        [
            'match' =>
                [
                    'casetype' => $request->casetype
                ]
        ];

        (!(empty($request->casetype))) ? $data['query']['bool']['must'][] = $casetype : '';

        $advocate =
        [
            'match' =>
                [
                    'advocate' => $request->advocate
                ]
        ];

        (!(empty($request->advocate))) ? $data['query']['bool']['must'][] = $advocate : '';

        $actnote =
        [
            'match' =>
                [
                    'actnote' => $request->actnote
                ]
        ];

        (!(empty($request->actnote))) ? $data['query']['bool']['must'][] = $actnote : '';

    }
}
