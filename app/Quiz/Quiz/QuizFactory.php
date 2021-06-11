<?php namespace App\Quiz\Quiz;

use App\Quiz\Interfaces\QuizRepositoryInterface;
use App\Quiz\Answer\AnswerFactoryDirector;
use App\Quiz\Question\Question;
use App\Repositories\EloquentRepositories\EloquentQuizRepository;
use App\Repositories\EloquentRepositories\QuestionRepository;
use App\Repositories\FileRepositories\FileQuizRepository;

class QuizFactory {

    protected QuizRepositoryInterface $quizRepository;
    protected AnswerFactoryDirector $answerFactoryDirector;
    protected QuestionRepository $questionRepository;

    public function __construct(QuizRepositoryInterface $quizRepository, AnswerFactoryDirector $answerFactoryDirector, QuestionRepository $questionRepository)
    {
        $this->quizRepository = $quizRepository;
        //answerfactorydirector
        $this->answerFactoryDirector = $answerFactoryDirector;
        //QuestionRepository à envoyer dans le constructor
        $this->questionRepository = $questionRepository;
    }

    protected function createQuiz():Quiz
    {
        // we retrieved data from quizrepository and we instanciate a Quiz obejct
        $preparedQuestions = $this->quizRepository->fetch();
        
        $quizQuestions = [];

        foreach($preparedQuestions as $preparedQuestion) {

            $answers = [];
            
            foreach($preparedQuestion['answers'] as $answer) {
                $director = new AnswerFactoryDirector();
                $AnswerFactory = $director->getAnswerFactory($answer, $preparedQuestion['type']);
                $answers []= $AnswerFactory->getAnswer();
            }

            $preparedQuestion['answers'] = $answers;
            $quizQuestions [] = new Question($preparedQuestion, $this->questionRepository);
        }

        return new Quiz($quizQuestions, $this->questionRepository);
    }
    
    public function getQuiz():Quiz
    {
        return $this->createQuiz();
    }
}