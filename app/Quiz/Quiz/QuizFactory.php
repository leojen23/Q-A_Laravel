<?php namespace App\Quiz\Quiz;


use App\Quiz\Interfaces\QuizRepositoryInterface;
use App\Quiz\Answer\Answer;
use App\Quiz\Answer\AnswerFactoryDirector;
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

        $quizQuestions = [];
        // echo '<pre>' . var_export($preparedQuestions[1]['answers'], true) . '</pre>';
        // die;
        foreach($preparedQuestions as $preparedQuestion){


            //echo '<pre>' . var_export($preparedQuestion['answers'], true) . '</pre>';
            $answers = [];

            foreach($preparedQuestion['answers'] as $answer){
                $director = new AnswerFactoryDirector($answer);
                $AnswerFactory = $director->getAnswerFactory($preparedQuestion['type']);
                $answers []= $AnswerFactory->getAnswer();
            }
            // echo '<pre>' . var_export($AnswerFactory, true) . '</pre>';
            // die;
            $preparedQuestion['answers'] = $answers;
            $quizQuestions [] = new Question($preparedQuestion, $this->questionRepository);
            
            
            
        }
        
        //echo '<pre>' . var_export($quizQuestions, true) . '</pre>';
        echo '<pre>' . var_export(new Quiz($quizQuestions, $this->questionRepository), true) . '</pre>';
        return new Quiz($quizQuestions, $this->questionRepository);
    }
    //il faut ici instancier un new quiz(avec question et answer)
    
    public function getQuiz():Quiz{
        return $this->createQuiz();
    }
}