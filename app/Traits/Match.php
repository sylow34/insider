<?php


namespace App\Traits;


use Illuminate\Database\Eloquent\Model;

trait Match
{

    /**
     * @param array $clubs
     * @return array|\Illuminate\Support\Collection
     */
    protected static function getMatch($clubs)
    {
        $matchTable = [];
        $season = self::getSeason();
        for ($i = 0; $i < $clubs->count(); $i++) {
            for ($j = 0; $j < $clubs->count(); $j++) {
                if ($i !== $j) {
                    $scoreWithClubs = self::setScore([collect($clubs[$i])->toArray(), collect($clubs[$j])->toArray()]);
                    $matchTable[] = self::setSeason($scoreWithClubs, $season);
                }
            }
        }

        return collect($matchTable)->shuffle();
    }

    /**
     * @param array $clubs
     * @return array
     * @throws \Exception
     */
    protected static function setScore(array $clubs): array
    {
        return [
            collect($clubs[0])->put('score', random_int(0, 5)),
            collect($clubs[1])->put('score', random_int(0, 5))
        ];
    }

    /**
     * @param array $clubs
     * @param int $season
     * @return array
     */
    protected static function setSeason(array $clubs, int $season): array
    {
        return [
            collect($clubs[0])->put('season', $season),
            collect($clubs[1])->put('season', $season),
        ];
    }

    /**
     * @return int
     * @throws \Exception
     */
    protected static function getSeason(): int
    {
        return random_int(2020, 3000);
    }

}
