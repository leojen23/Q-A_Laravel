<?php namespace App\Repositories\EloquentRepositories;

use App\Repositories\EloquentRepositories\Presenters\QuizAdapter;
use App\Quiz\Interfaces\QuizRepositoryInterface;
use App\Repositories\FileRepositories\Presenters\QuizPresenter;

class QuizRepository implements QuizRepositoryInterface
{
    protected $presenter;

    public function __construct()
    {
        $this->presenter = new QuizPresenter();
    }

    public function fetch():array {
        return [];
    }
//recuperer data depuis bdd et les envoyers sur la factory et sortir un objet
}