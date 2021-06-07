<?php

namespace App\Quiz\Answer;


use App\Quiz\Answer\Factories\AnswerFactoryInterface;
use App\Quiz\Answer\Type\AnswerInterface;

abstract class AnswerFactory implements AnswerFactoryInterface{

    abstract public function getAnswer():AnswerInterface;
    abstract protected function createAnswer($label,$is_valid,$id):AnswerInterface;

}