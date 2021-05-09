<?php namespace App\Repositories;

use App\Quiz\Interfaces\AnswerRepositoryInterface;
use App\Models\Question as Question;
use App\Models\Answer as Answer;

class AnswerRepository implements AnswerRepositoryInterface
{

    protected $model;

    public function __construct()
    {
        $this->model = Answer::class;
    }

  
  public function create($data):array{
    $model = $this->model;
    $answer_model = new $model($data);
    $answer_model->save();
    return (array) $answer_model;
  }
}
