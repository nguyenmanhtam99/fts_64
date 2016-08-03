<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\User\UserRepository;
use App\Repositories\Subject\SubjectRepository;
use App\Repositories\Question\QuestionRepository;
use App\Repositories\Option\OptionRepository;
use App\Repositories\UserQuestion\UserQuestionRepository;
use App;
use App\Repositories\User\UserRepositoryInterface;
use App\Repositories\Social\SocialRepository;
use App\Repositories\Social\SocialRepositoryInterface;
use App\Repositories\Subject\SubjectRepositoryInterface;
use App\Repositories\Question\QuestionRepositoryInterface;
use App\Repositories\Option\OptionRepositoryInterface;
use App\Repositories\UserQuestion\UserQuestionRepositoryInterface;

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
        App::bind(QuestionRepositoryInterface::class, QuestionRepository::class);
        App::bind(OptionRepositoryInterface::class, OptionRepository::class);
        App::bind(UserQuestionRepositoryInterface::class, UserQuestionRepository::class);
    }
}
