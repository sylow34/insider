<?php


namespace App\Traits;


trait Score
{

    protected static function getMatchResult(array $teams): array
    {
        $result = [
            'winner_score' => 0,
            'winner_id' => 0,
            'loser_score' => 0,
            'loser_id' => 0,
            'drawn' => '0',
        ];
        if ($teams[0]['score'] > $teams[1]['score']) {
            $result['winner_score'] = $teams[0]['score'];
            $result['winner_id'] = $teams[0]['id'];
            $result['loser_score'] = $teams[1]['score'];
            $result['loser_id'] = $teams[1]['id'];
        }
        if ($teams[1]['score'] > $teams[0]['score']) {
            $result['winner_score'] = $teams[1]['score'];
            $result['winner_id'] = $teams[1]['id'];
            $result['loser_score'] = $teams[0]['score'];
            $result['loser_id'] = $teams[0]['id'];
        }
        if ($teams[1]['score'] === $teams[0]['score']) {
            $result['drawn'] = '1';
        }
        return $result;
    }


}
