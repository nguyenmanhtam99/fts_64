<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\User\UserRepository;
use App\Repositories\Subject\SubjectRepository;
use App;
use App\Repositories\User\UserRepositoryInterface;
use App\Repositories\Social\SocialRepository;
use App\Repositories\Social\SocialRepositoryInterface;
use App\Repositories\Subject\SubjectRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        App::bind(UserRepositoryInterface::class, UserRepository::class);
        App::bind(SocialRepositoryInterface::class, SocialRepository::class);
        App::bind(SubjectRepositoryInterface::class, SubjectRepository::class);
    }
}
