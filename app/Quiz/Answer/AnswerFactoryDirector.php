<?php namespace App\Quiz\Answer;

use App\Quiz\Answer;
use App\Quiz\Answer\Factories\AnswerCheckboxFactory;
use App\Quiz\Answer\Factories\AnswerFactoryInterface;
use App\Quiz\Answer\Factories\AnswerRadioFactory;
use App\Quiz\Answer\Factories\AnswerTextFactory;

class AnswerFactoryDirector
{
    
    //determine quelle type de answer factory à instancier

    public function getAnswerFactory($type):AnswerFactoryInterface
    {
        switch ($type) {
            case 'radio':
                return new AnswerRadioFactory;
                break;
            case 'text':
                return new AnswerTextFactory;
                break;
            case 'checkbox':
                return new AnswerCheckboxFactory;
                break;
            default:
                return new AnswerTextFactory;
                break;
        }

        //manière dynamique à implémenter plus tard
        // $factoryClass = 'Answer'.ucfirst(strtolower($type)).'Factory';
        // $factory = new $factoryClass();       
        // return $factory;
    }
}
