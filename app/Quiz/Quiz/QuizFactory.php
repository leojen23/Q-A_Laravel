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
        // $repoFile = new FileQuizRepository('../questions.json');
        // $questionsFile = $repoFile->fetch();
        // dump($questionsFile);

        // $repoEloquent = new EloquentQuizRepository();
        // $questionsEloquent = $repoEloquent->fetch();
        // dump($questionsEloquent);
        // die();

        $preparedQuestions = $this->quizRepository->fetch();
        
        $quizQuestions = [];

        //traitement différent car FileRepo renvoie le quizz groupé par question
        //alors que EloquentRepo renvoie réponse par réponse
        if (get_class($this->quizRepository) === FileQuizRepository::class) {

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

        } elseif (get_class($this->quizRepository) === EloquentQuizRepository::class) {

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

        }

        
        // echo '<pre>' . var_export(new Quiz($quizQuestions, $this->questionRepository), true) . '</pre>';
        return new Quiz($quizQuestions, $this->questionRepository);
    }
    
    public function getQuiz():Quiz
    {
        return $this->createQuiz();
    }
}