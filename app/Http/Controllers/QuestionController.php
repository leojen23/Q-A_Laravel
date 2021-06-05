<?php

namespace App\Http\Controllers;

use App\Quiz\Quiz\QuizFactory;
use App\Repositories\EloquentRepositories\QuizRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

class QuestionController extends Controller
{
    public function index () {
        /* on récupérer les donnes depuis la bdd et on envoie à la 
        quiz factory qui va recreer un new quiz. On ajoute dans le controller
        une méthode displayRandom pour l'affichage.*/
        $questions = DB::table('questions')
             ->join('answers', 'questions.id', '=', 'answers.question_id')
             ->select('questions.*', 'answers.*')
             ->get();
             var_dump($questions);
        }
        // $quizRepository = new QuizRepository();
        // var_dump($quizRepository->fetch());
        // die;
        // $factory = new QuizFactory($quizRepository);
        // $quiz = $factory->getQuiz();
        // var_dump($quiz->getRandomQuestion());
    }
