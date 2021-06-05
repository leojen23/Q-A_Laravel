<?php

namespace App\Http\Controllers;

use App\Quiz\Quiz\QuizFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class QuestionController extends Controller
{
    public function index () {
        /* on récupérer les donnes depuis la bdd et on envoie à la 
        quiz factory qui va recreer un new quiz. On ajoute dans le controller
        une méthode displayRandom pour l'affichage.*/

        $factory = new QuizFactory();
        $factory->get();
        //Artisan::call('json:parse');
        //return view('question');
    }
}
