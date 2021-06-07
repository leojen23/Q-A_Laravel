<?php 

namespace App\Quiz\Answer\Factories;

use App\Quiz\Answer\AnswerFactory;
use App\Quiz\Answer\Type\AnswerCheckbox;
use App\Quiz\Answer\Type\AnswerInterface;

class AnswerCheckboxFactory extends AnswerFactory implements AnswerFactoryInterface {
    

    protected function createAnswer($label,$is_valid,$id):AnswerInterface{
        return new AnswerCheckbox($label, $is_valid);
    }


    public function getAnswer():AnswerInterface{
        var_dump('i am a Checkbox factory');
        return $this->createAnswer('louise', 1,5);
    }
}
