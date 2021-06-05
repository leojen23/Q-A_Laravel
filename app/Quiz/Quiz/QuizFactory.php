<?php namespace App\Quiz\Quiz;

use App\Quiz\Question\Question;
use App\Repositories\EloquentRepositories\QuestionRepository;
use App\Repositories\FileRepositories\FileQuizRepository;

class QuizFactory {

    protected QuestionRepository $questionRepository;
    protected FileQuizRepository $fileQuizRepository;

    public function __construct()
    {
        $this->questionRepository = new QuestionRepository();
        $this->fileQuizRepository = new FileQuizRepository();
    }
    protected function create(){
        $preparedQuestions = $this->fileQuizRepository->fetch();
        // foreach ($preparedQuestions as $question){
           
        //     return $this->questionRepository->createAndSync($question, $question['answers']);
        // }
    }
    //il faut ici instancier un new quiz(avec question et answer)
    
    public function get(){
        return $this->create();
    }
}