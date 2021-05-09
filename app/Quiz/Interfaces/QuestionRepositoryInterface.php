<?php namespace App\Quiz\Interfaces;


interface QuestionRepositoryInterface {

    public function createAndSync(array $question, array $answers);
}