<?php namespace App\Repositories\FileRepositories;

use App\Repositories\FileRepositories\Presenters\QuizAdapter;
use App\Quiz\Interfaces\QuizRepositoryInterface;
use App\Repositories\FileRepositories\Presenters\QuizPresenter;

class QuizRepository implements QuizRepositoryInterface
{
    protected string $file;
    protected $presenter;

    public function __construct($file = 'questions.json')
    {
        if(!file_exists($file))
            throw new \Exception('file does not exists');
        $this->file = $file;
        $this->presenter = new QuizPresenter();
    }

    public function fetch():array{
        $questions = json_decode(file_get_contents($this->file, true), true);
      	$preparedQuestions = [];
      	foreach($questions as $q)
	        $preparedQuestions[] = $this->presenter->present($content);
      	return $preparedQuestions;
    }

}