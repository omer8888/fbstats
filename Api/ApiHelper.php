<?php

function makeApiRequest()
{
    $url = "https://api.football-data.org/v2/matches";
    $options = [
        'http' => [
            'header' => "X-Auth-Token: 04273bce2c654fc39d174d038c330f36",
        ],
    ];
    $context = stream_context_create($options);
    $response = file_get_contents($url, false, $context);

    return json_decode($response, true);
}

function getMatchesGroupedByLege($response){
    $groupedMatches = [];
    if (isset($response['matches'])) {
        foreach ($response['matches'] as $match) {
            $competitionName = $match['competition']['name'];
            $groupedMatches[$competitionName][] = $match;
        }
    }
    return $groupedMatches;
}

