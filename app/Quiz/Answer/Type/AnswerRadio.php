<?php
namespace App\Quiz\Answer\Type;
use App\Quiz\Answer\Answer;

class AnswerRadio extends Answer{
    
    public function render() {
        return $this->label;
    }

}