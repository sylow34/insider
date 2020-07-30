<?php


namespace App\Repositories;


use App\Model\Score;
use App\Repositories\RepositoryInterface\ScoreInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class ScoreRepository extends BaseRepository implements ScoreInterface
{

    use \App\Traits\Score;

    protected $model;

    public function __construct(Score $model)
    {
        parent::__construct($model);

        $this->model = $model;
    }


    /**
     * @param array $matches
     * @return bool
     */
    public function setMatch(array $matches): bool
    {

        try {
            collect($matches)->each(function ($data, $key) {

                $result = self::getMatchResult($data);

                $this->model->create([
                    'home' => $data[0]['id'],
                    'outside' => $data[1]['id'],
                    'winner_id' => $result['winner_id'],
                    'winner_score' => $result['winner_score'],
                    'loser_score' => $result['loser_score'],
                    'loser_id' => $result['loser_id'],
                    'drawn' => $result['drawn'],
                    'week' => $key + 1,
                    'season' => $data[0]['season']
                ]);

            });
            return true;
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return false;
        }


    }

    public function getScore(int $season)
    {
        return Score::where(['season' => $season])->get();

    }

    public function getClubWinnerInfo($season)
    {
        return Score::where(['season' => $season])
            ->where('winner_id', '!=', 0)->get()->groupBy('winner_id')->toArray();
    }

    public function getPointTable(int $season)
    {
        $result = [];
        $table = self::getScore($season);

      collect($table)->each(function ($data) use (&$result) {


        });
    }

    public function getClubLoserInfo($season)
    {
        return Score::where(['season' => $season])
            ->where('loser_id', '!=', 0)->get()->groupBy('loser_id')->toArray();
    }

    public function getClubDrawnInfo($season)
    {
        return Score::where(['season' => $season])
            ->where('drawn', '=', 0)->get()->groupBy('drawn')->toArray();
    }

}
