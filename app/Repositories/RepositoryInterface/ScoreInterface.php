<?php


namespace App\Repositories\RepositoryInterface;


use Illuminate\Database\Eloquent\Model;

interface ScoreInterface extends BaseInterface
{

    /**
     * @param array $attributes
     * @return bool
     */
    public function setMatch(array $attributes): bool;


    /**
     * @param int $season
     * @return Model
     */
    public function getScore(int $season);

    public function getClubWinnerInfo(int $season);

    //public function getPointTable(array $table, int $clubCount);
    public function getPointTable(int $season);

}
