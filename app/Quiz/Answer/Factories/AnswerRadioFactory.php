<?php 

namespace App\Quiz\Answer\Factories;


use App\Quiz\Answer\AnswerFactory;
use App\Quiz\Answer\Type\AnswerInterface;
use App\Quiz\Answer\Type\AnswerRadio;

class AnswerRadioFactory extends AnswerFactory implements AnswerFactoryInterface {
    
    protected Array $answer;
    //determine quelle type de answer factory à instancier
    public function __construct($answer)
    {
      $this->answer= $answer;
    }
    protected function createAnswer():AnswerInterface{
        return new AnswerRadio($this->answer);
    }
    public function getAnswer():AnswerInterface{
        var_dump('i am a Radio factory');
        return $this->createAnswer();
    }
}