<?php

namespace App\Console\Commands;

use App\Quiz\Quiz\Quiz;
use App\Quiz\Quiz\QuizFactory;
use App\Repositories\FileRepositories\FileQuizRepository;
use Illuminate\Console\Command;

class ParseJsonQuiz extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'json:parse';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'populates database';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
       /* return 0;*/
        //1 ------ instancier la quiz factory (Afin de créer et gérer le quiz, celle-ci aura besoin de, File QuizRepository, QuestionRepository.)
        
        $factory = new QuizFactory(new FileQuizRepository());
        //2 ------ Créer le quiz, on récupére un tableau avec questions & réponses 
        $quiz = $factory->getQuiz();
        //3 ------ appeler la fonction save() de quiz pour enregistrer en bdd
        $quiz->save();
        
    }
}
