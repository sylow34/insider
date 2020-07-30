<?php


namespace App\Repositories;


use App\Model\Point;
use App\Repositories\RepositoryInterface\PointInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class PointRepository extends BaseRepository implements PointInterface
{

    use \App\Traits\Score;

    protected $model;

    public function __construct(Point $model)
    {
        parent::__construct($model);

        $this->model = $model;
    }


    /**
     * @param array $matches
     * @return bool
     */
    public function setPoint(array $matches): bool
    {

        dd($matches);
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


}
