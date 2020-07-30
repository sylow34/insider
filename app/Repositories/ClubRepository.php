<?php


namespace App\Repositories;


use App\Model\Club;
use App\Repositories\RepositoryInterface\ClubInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class ClubRepository extends BaseRepository implements ClubInterface
{

    protected $model;

    public function __construct(Club $model)
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

                $this->model->create([
                    'home' => $data[0]['id'],
                    'outside' => $data[1]['id'],
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
