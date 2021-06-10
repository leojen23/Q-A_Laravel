<?php
namespace App\Quiz\Answer\Type;

use App\Quiz\Answer\Answer;

class AnswerCheckbox extends Answer implements AnswerInterface{
    
    public function render(){
        return [
            'label' => $this->label,
            'type' => 'checkbox'
        ];
    }

}