<?php namespace App\Repositories\EloquentRepositories;

use App\Models\Question;
use App\Repositories\EloquentRepositories\Presenters\QuizAdapter;
use App\Quiz\Interfaces\QuizRepositoryInterface;
use App\Repositories\FileRepositories\Presenters\QuizPresenter;
use Illuminate\Support\Facades\DB;

class QuizRepository implements QuizRepositoryInterface
{
    protected $presenter;

    public function __construct()
    {
        $this->presenter = new QuizPresenter();
    }

    public function fetch():array {
        //  $questions = DB::table('questions')
        //      ->join('questions', function ($join) {
        //      $join->on('questions.id', '=', 'answers.questions_id');
        // });
        return [];
        
        //return $this->presenter($data);
    }
//recuperer data depuis bdd et les envoyers sur la factory et sortir un objet
}