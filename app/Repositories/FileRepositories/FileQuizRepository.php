<?php namespace App\Repositories\FileRepositories;


use App\Quiz\Interfaces\QuizRepositoryInterface;
use App\Repositories\FileRepositories\Presenters\QuizPresenter;

class FileQuizRepository implements QuizRepositoryInterface
{
    protected string $file;
    protected $presenter;

    public function __construct($file = './questions.json')
    {
        if(!file_exists($file))
            throw new \Exception('file does not exists');
        $this->file = $file;
        $this->presenter = new QuizPresenter();
    }

    public function fetch():array
    {
        $questions = json_decode(file_get_contents($this->file, true), true);
        $preparedQuestions = [];
        foreach($questions as $question){
            $preparedQuestions[] = $this->presenter->present($question);
        }
        return $preparedQuestions;
    }
}