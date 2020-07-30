<?php


namespace App\Repositories;


use App\Repositories\RepositoryInterface\BaseInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class BaseRepository implements BaseInterface
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * BaseRepository constructor.
     *
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * @inheritDoc
     */
    public function all()
    {
        return $this->model::all();
    }

    /**
     * @param array $attributes
     *
     * @return Model
     */
    public function create(array $attributes): Model
    {
        return $this->model::create($attributes);
    }

    /**
     * @param $id
     * @return Model
     */
    public function find($id): ?Model
    {
        return $this->model::findOrFail($id);
    }

    /**
     * @param array $attributes
     * @return Model
     */
    public function findOneBy(array $attributes): ?Model
    {
        return $this->model::where($attributes)->firstOrFail();
    }

    /**
     * @param array $attributes
     * @return Model
     */
    public function findAllBy(array $attributes): ?Model
    {
        return $this->model::where($attributes)->get();
    }

    /**
     * @return int
     */
    public function getUserId(): int {
        return Auth::user()->id;
    }

    /**
     * @return string
     */
    public function getUserEmail(): string {
        return Auth::user()->email;
    }
}
