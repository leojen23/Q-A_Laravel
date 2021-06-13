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
        // we retrieve Question data susing the fect() method of the quiz repository that is passed to the quiz factory
        $preparedQuestions = $this->quizRepository->fetch();
        
        // we initialize an empty array of questions that will be used as parameter to instanciate a new Quiz Object
        $quizQuestions = [];

        foreach($preparedQuestions as $preparedQuestion) {

            $answers = [];
            
            foreach($preparedQuestion['answers'] as $answer) {

                // We instanciate a new factory director
                $director = new AnswerFactoryDirector();

                //we call the Director's "getAnswerFactory()" method to instanciate the appropriate Answerfactory
                $AnswerFactory = $director->getAnswerFactory($answer, $preparedQuestion['type']);

                //we call the AnswerFactory's getAnswer() method to instanciate our Answers and push them into an empy array
                $answers []= $AnswerFactory->getAnswer();
            }

            // we assign our array of answer objects as the new value of our prepared questions answer key.
            $preparedQuestion['answers'] = $answers;

            //we return a question object containing its answers objects
            $quizQuestions [] = new Question($preparedQuestion, $this->questionRepository);
        }

        //we return a new Quiz object
        return new Quiz($quizQuestions, $this->questionRepository);
    }
    
    public function getQuiz():Quiz
    {
        return $this->createQuiz();
    }
}