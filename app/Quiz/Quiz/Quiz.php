<?php

namespace App\Quiz\Quiz;

use App\Quiz\Interfaces\QuestionRepositoryInterface;
use App\Quiz\Question\Question;
use \App\Quizz\Question\RepositoryInterface;
use App\Repositories\EloquentRepositories\QuestionRepository;
use App\Repositories\EloquentRepositories\QuizRepository;

class Quiz
{
    protected array $questions = [];
    protected QuestionRepositoryInterface $questionRepository;
  
    public function __construct(array $questions, QuestionRepositoryInterface $questionRepository)
    {
        $this->questions = $questions;
        $this->questionRepository = $questionRepository;
    }

    public function save():void
    {
        foreach ($this->questions as $question) {
            // normalement pas besoin de cette ligne, car quand les questions arrivent
            // depuis la factory, elles sont déjà instanciées en objet Question
            // $question = new Question($preparedQuestion, $this->questionRepository);
            $question->save();
        }
    }

    public function getRandomQuestion()
    {
       $randomIndex = array_rand($this->questions, 1);
       return $this->questions[$randomIndex];
    }
}