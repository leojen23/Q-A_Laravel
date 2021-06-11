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
        $randomQuestionArray = $this->displayRandom();
        return view('question', ['question' => $randomQuestionArray]);
    }

    protected function displayRandom() {
        $quizFactory = new QuizFactory(new EloquentQuizRepository(), new AnswerFactoryDirector(), new QuestionRepository());
        $quiz = $quizFactory->getQuiz();
        $randomQuestion = $quiz->getRandomQuestion();
        $randomQuestionArray = $randomQuestion->convertToArray();
        return $randomQuestionArray ;
    }
}