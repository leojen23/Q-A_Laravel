<?php

namespace App\Quiz\Quiz;

use App\Quiz\Interfaces\QuestionRepositoryInterface;
use App\Quiz\Question\Question;
use \App\Quizz\Question\RepositoryInterface;
use App\Repositories\EloquentRepositories\QuestionRepository;
use App\Repositories\EloquentRepositories\QuizRepository;

class Quiz
{
    protected array $preparedQuestions = [];
    protected QuestionRepositoryInterface $questionRepository;
  
    public function __construct(array $preparedQuestions, QuestionRepositoryInterface $questionRepository)
    {
        $this->preparedQuestions = $preparedQuestions;
        $this->questionRepository = $questionRepository;
    }

    public function save():void{
        foreach ($this->preparedQuestions as $preparedQuestion) {
            $question = new Question($preparedQuestion, $this->questionRepository);
            $question->save();
        }
    }
    public function getRandomQuestion(){
       return array_rand($this->preparedQuestions, 1);
      // $questionRepository->fetch();
    }
}