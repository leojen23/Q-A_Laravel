<?php 

namespace App\Quiz\Answer\Factories;

use App\Quiz\Answer\AnswerFactory;
use App\Quiz\Answer\Type\AnswerCheckbox;
use App\Quiz\Answer\Type\AnswerInterface;

class AnswerCheckboxFactory extends AnswerFactory implements AnswerFactoryInterface {
    
    protected Array $answer;
    //determine quelle type de answer factory à instancier
    public function __construct($answer)
    {
      $this->answer= $answer;
    }
    protected function createAnswer():AnswerInterface{
        
        return new AnswerCheckbox($this->answer);
    }
    public function getAnswer():AnswerInterface{
        var_dump('i am a Checkbox factory');
        return $this->createAnswer();
    }
}
