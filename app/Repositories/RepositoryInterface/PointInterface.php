<?php


namespace App\Repositories\RepositoryInterface;


use Illuminate\Database\Eloquent\Model;

interface PointInterface extends BaseInterface
{

    /**
     * @param array $attributes
     * @return bool
     */
    public function setPoint(array $attributes): bool ;

}
