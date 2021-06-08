<?php
namespace App\Quiz\Answer\Type;

use App\Quiz\Answer\Answer;

class AnswerCheckbox extends Answer implements AnswerInterface{
    
    public function render(){
        var_dump('I am a checkbox render');
    }

}