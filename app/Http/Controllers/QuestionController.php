<?php

namespace App\Http\Controllers;

use App\AnswerRadioFactory;
use App\Quiz\Answer\AnswerFactoryDirector;
// use App\Quiz\Answer\Factories\AnswerRadioFactory;
use App\Quiz\Quiz\QuizFactory;
use App\Repositories\EloquentRepositories\QuizRepository;
use App\Repositories\FileRepositories\FileQuizRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

class QuestionController extends Controller
{
    public function index () {
        /* on récupérer les donnes depuis la bdd et on envoie à la 
        quiz factory qui va recreer un new quiz. On ajoute dans le controller
        une méthode displayRandom pour l'affichage.*/


        $director = new AnswerFactoryDirector();
        $radioFactory = $director->getAnswerFactory('checkbox');
        var_dump($radioFactory->getAnswer());


        // $factory = new QuizFactory(new FileQuizRepository());

        // $factory->getQuiz();






        // $questions = DB::table('questions')
        //     ->join('answers', 'questions.id', '=','answers.question_id')
        //     ->select('questions.*')
        //     // ->where('questions.id', 'answers.question_id)
        //     ->get();
        //     echo '<pre>' . var_export($questions, true) . '</pre>';
            
        //     foreach ($questions as $question) {
        //         $answers = [];
                
        //         $answers = DB::table('answers')
        //         ->select('answers.*')
        //         ->where('answers.question_id', $question->id)
        //         ->get();
                
        //         echo '<pre>' . var_export($answers, true) . '</pre>';
            }
             //return view ('profile',compact('data'));
        // $questions = DB::table('questions')
        //      ->join('answers', 'questions.id', '=', 'answers.question_id')
        //      ->select('questions.*', 'answers.*')
        //      ->get();
        //      $questions = DB::table("questions")
        //      ->join('answers', 'questions.id', '=','answers.question_id')
        //      ->select('questions.label')
        //      ->get();
        //      // $quizRepository = new QuizRepository();
        public function displayRandom(){}
        //      var_dump($questions);
            }
        // var_dump($quizRepository->fetch());
        // die;
        // $factory = new QuizFactory($quizRepository);
        // $quiz = $factory->getQuiz();
        // var_dump($quiz->getRandomQuestion());
    

