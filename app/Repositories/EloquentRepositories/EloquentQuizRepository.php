<?php namespace App\Repositories\EloquentRepositories;

use App\Quiz\Interfaces\QuizRepositoryInterface;
use App\Repositories\EloquentRepositories\Presenters\QuizPresenter;
use Illuminate\Support\Facades\DB;

class EloquentQuizRepository implements QuizRepositoryInterface
{
    protected $presenter;

    public function __construct()
    {
        $this->presenter = new QuizPresenter();
    }

    public function fetch():array 
    {
        $questions = DB::table('questions')
                        ->join('answers', 'questions.id', '=', 'question_id')
                        ->select('questions.label AS questionLabel', 
                                'questions.type AS questionType', 
                                'answers.label AS answerLabel',
                                'answers.is_valid',
                                'answers.id AS id')
                        ->get();

        $preparedQuestions = $this->presenter->present($questions);
        
        return $preparedQuestions;
    }
}