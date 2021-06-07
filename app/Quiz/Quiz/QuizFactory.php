<?php namespace App\Quiz\Quiz;


use App\Quiz\Interfaces\QuizRepositoryInterface;
use App\Quiz\Answer\Answer;
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
        $quizQuestions =[];
        foreach($preparedQuestions as $preparedQuestion){
            
            echo '<pre>' . var_export($preparedQuestion, true) . '</pre>';
            //instancier les réponses
            $answers [] = new Answer('hello', 1
                // $preparedQuestion['answers'][0]['label'],
                // $preparedQuestion['answers'][0]['is_valid'],
                // $preparedQuestion['answers']['id']
            );
            echo '<pre>' . var_export($answers, true) . '</pre>';

            //instancier les réponses et ajouter leurs réponses
            //passer un tableau de questions finies avec des objets instancier au présenter

        }
        
        return new Quiz($quizQuestions, $this->questionRepository);
    }
    //il faut ici instancier un new quiz(avec question et answer)
    
    public function getQuiz():Quiz{
        return $this->createQuiz();
    }
}