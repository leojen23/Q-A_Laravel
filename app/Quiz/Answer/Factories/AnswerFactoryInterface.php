<?php namespace App\Quiz\Answer\Factories;


use App\Quiz\Answer\Type\AnswerInterface;

interface AnswerFactoryInterface {

    public function getAnswer():AnswerInterface;

}