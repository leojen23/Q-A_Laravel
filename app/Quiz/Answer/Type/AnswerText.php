<?php
namespace App\Quiz\Answer\Type;
use App\Quiz\Answer\Answer;

class AnswerText extends Answer{
    
    public function render() {
        return $this->label;
    }

}