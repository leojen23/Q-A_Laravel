<?php namespace App\Repositories\EloquentRepositories;

use App\Models\Question as Question;
use App\Presenters\QuestionPresenter;
use App\Quiz\Interfaces\QuestionRepositoryInterface;

//Les méthodes public du Repository ne doivent pas retourner de modèle. Soit des tableaux, soit des classes métiers

class QuestionRepository implements QuestionRepositoryInterface
{

  	protected $model;

    public function __construct()
    {
        $this->model = Question::class;
    }

    public function createAndSync(array $question, array $answers):array{
        $question_model = $this->create($question);
        $this->syncAnswers($question_model, $answers);
        return (array)$question_model;
    }

    //Protected car retourne un model
    protected function create(array $data):Question{
      	$model = $this->model;
        $question_model = new $model($data);
        $question_model->save();
        return $question_model;
    }

    protected function syncAnswers($model, $data)
    {
        $model->answers()->createMany($data);
        return $this;
    }
}