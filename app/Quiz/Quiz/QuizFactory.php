<?php namespace App\Quiz\Quiz;

use App\Quiz\Interfaces\QuizRepositoryInterface;
use App\Quiz\Question\Question;
use App\Repositories\EloquentRepositories\QuestionRepository;
use App\Repositories\FileRepositories\FileQuizRepository;

class QuizFactory {

    protected QuestionRepository $questionRepository;
    protected QuizRepositoryInterface $quizRepository;

    public function __construct(QuizRepositoryInterface $quizRepository)
    {
        $this->questionRepository = new QuestionRepository();
        $this->quizRepository = $quizRepository;
    }
    protected function createQuiz():Quiz{
        $preparedQuestions = $this->quizRepository->fetch();
        return new Quiz($preparedQuestions, $this->questionRepository);
    }
    //il faut ici instancier un new quiz(avec question et answer)
    
    public function getQuiz():Quiz{
        return $this->createQuiz();
    }
}