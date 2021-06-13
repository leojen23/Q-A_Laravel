<?php

namespace App\Console\Commands;

use App\Quiz\Answer\AnswerFactoryDirector;
use App\Quiz\Quiz\Quiz;
use App\Quiz\Quiz\QuizFactory;
use App\Repositories\EloquentRepositories\QuestionRepository;
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
        //1 ------ we instanciate a quiz factory
        $factory = new QuizFactory(new FileQuizRepository(), new AnswerFactoryDirector(), new QuestionRepository);
        //2 ------ we instanciate the quiz using the Factory's getQuiz() method
        $quiz = $factory->getQuiz();
        //3 ------ we populate the database using the quiz's save() method
        $quiz->save();
    }
}
