<?php

namespace App\Http\Controllers;

use App\Quiz\Answer\AnswerFactoryDirector;
use App\Quiz\Quiz\QuizFactory;
use App\Repositories\EloquentRepositories\EloquentQuizRepository;
use App\Repositories\EloquentRepositories\QuestionRepository;

class QuestionController extends Controller
{
    public function index () {
        //instancier Quiz Factory avec EloquentRepositories\QuizRepository
        $quizFactory = new QuizFactory(new EloquentQuizRepository(), new AnswerFactoryDirector(), new QuestionRepository());

        //créer le quizz
        $quizFactory->getQuiz();

    }

    public function displayRandom() {}
}
    

