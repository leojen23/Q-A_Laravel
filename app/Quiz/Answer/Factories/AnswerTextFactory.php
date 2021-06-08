<?php 

namespace App\Quiz\Answer\Factories;

use App\Quiz\Answer\AnswerFactory;
use App\Quiz\Answer\Type\AnswerInterface;
use App\Quiz\Answer\Type\AnswerText;

class AnswerTextFactory extends AnswerFactory implements AnswerFactoryInterface {
    
    protected Array $answer;
    //determine quelle type de answer factory à instancier
    public function __construct($answer)
    {
      $this->answer= $answer;
    }
    protected function createAnswer():AnswerInterface{
        return new AnswerText($this->answer);
    }
    public function getAnswer():AnswerInterface{
        var_dump('i am a Text factory');
        return $this->createAnswer();
    }
}
