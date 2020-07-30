<?php

namespace App\Providers;

use App\Repositories\BaseRepository;
use App\Repositories\PointRepository;
use App\Repositories\RepositoryInterface\BaseInterface;
use App\Repositories\RepositoryInterface\ClubInterface;
use App\Repositories\ClubRepository;
use App\Repositories\RepositoryInterface\PointInterface;
use App\Repositories\RepositoryInterface\ScoreInterface;
use App\Repositories\ScoreRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(BaseInterface::class, BaseRepository::class);
        $this->app->bind(ClubInterface::class, ClubRepository::class);
        $this->app->bind(ScoreInterface::class, ScoreRepository::class);
        $this->app->bind(PointInterface::class, PointRepository::class);
    }
}
