<?php namespace App\Quiz\Answer;

use App\Quiz\Answer;
use App\Quiz\Answer\Factories\AnswerCheckboxFactory;
use App\Quiz\Answer\Factories\AnswerFactoryInterface;
use App\Quiz\Answer\Factories\AnswerRadioFactory;
use App\Quiz\Answer\Factories\AnswerTextFactory;

class AnswerFactoryDirector
{
    
    protected Array $answer;
    //determine quelle type de answer factory à instancier
    public function __construct($answer)
    {
      $this->answer= $answer;
    }

    public function getAnswerFactory($type):AnswerFactoryInterface
    {
        switch ($type) {
            case 'radio':
                return new AnswerRadioFactory($this->answer);
                break;
            case 'text':
                return new AnswerTextFactory($this->answer);
                break;
            case 'checkbox':
                return new AnswerCheckboxFactory($this->answer);
                break;
            default:
                return new AnswerTextFactory($this->answer);
                break;
        }

        //manière dynamique à implémenter plus tard
        // $factoryClass = 'Answer'.ucfirst(strtolower($type)).'Factory';
        // $factory = new $factoryClass();       
        // return $factory;
    }
}
