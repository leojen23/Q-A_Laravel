<?php

namespace App\Http\Controllers;

use App\Quiz\Answer\AnswerFactoryDirector;
use App\Quiz\Quiz\QuizFactory;
use App\Repositories\EloquentRepositories\EloquentQuizRepository;
use App\Repositories\EloquentRepositories\QuestionRepository;

class QuestionController extends Controller
{
    // this method retrieve the questionArray and sends it to the view
    public function index () {
        $randomQuestionArray = $this->displayRandom();
        return view('question', ['question' => $randomQuestionArray]);
    }

    //this method returns a random question array to be sent to the view/ we convert the question object to avoid dependencies.
    protected function displayRandom() {
        $quizFactory = new QuizFactory(new EloquentQuizRepository(), new AnswerFactoryDirector(), new QuestionRepository());
        $quiz = $quizFactory->getQuiz();
        $randomQuestion = $quiz->getRandomQuestion();
        $randomQuestionArray = $randomQuestion->toArray();
        return $randomQuestionArray ;
    }
}