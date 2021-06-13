<?php

namespace App\Quiz\Quiz;

use App\Quiz\Interfaces\QuestionRepositoryInterface;

class Quiz
{
    protected array $questions = [];
    protected QuestionRepositoryInterface $questionRepository;
  
    public function __construct(array $questions, QuestionRepositoryInterface $questionRepository)
    {
        $this->questions = $questions;
        $this->questionRepository = $questionRepository;
    }

    // this method populates the database using the quiz data
    public function save():void
    {
        foreach ($this->questions as $question) {
            $question->save();
        }
    }

    //this method return a random question 
    public function getRandomQuestion()
    {
       $randomIndex = array_rand($this->questions, 1);
       return $this->questions[$randomIndex];
    }
}