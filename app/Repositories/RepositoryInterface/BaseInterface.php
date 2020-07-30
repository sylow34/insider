<?php


namespace App\Repositories\RepositoryInterface;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface BaseInterface
{
    /**
     * @param array $attributes
     * @return Model
     */
    public function create(array $attributes): Model;

    /**
     * @param $id
     * @return Model
     */
    public function find($id): ?Model;

    /**
     * Get's all posts.
     *
     * @return mixed
     */
    public function all();

    /**
     * @return int
     */
    public function getUserId(): int ;

    /**
     * @return string
     */
    public function getUserEmail(): string ;


    public function findOneBy(array $attributes): ?Model;

    public function findAllBy(array $attributes): ?Model;
}
