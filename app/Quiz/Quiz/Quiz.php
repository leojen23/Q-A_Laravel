<?php

namespace App\Quiz\Quiz;

use \App\Quizz\Question\RepositoryInterface as QuestionRepositoryInterface;


class Quiz
{
    protected array $questions = [];
  
    public function __construct(array $questions)
    {
        $this->questions = $questions;
    }

    public function save(){
        foreach ($this->questions as $question) {
            $question->save();
        }
    }
  
    public function getRandomQuestion(){
    }
}