<?php namespace App\Quiz\Answer;

use App\Quiz\Answer\Factories\AnswerCheckboxFactory;
use App\Quiz\Answer\Factories\AnswerFactoryInterface;
use App\Quiz\Answer\Factories\AnswerRadioFactory;
use App\Quiz\Answer\Factories\AnswerTextFactory;

class AnswerFactoryDirector
{

    // the factory director return an instanciated AnswerFactory depending on the question type
    public function getAnswerFactory(array $answer, string $type):AnswerFactoryInterface
    {
        switch ($type) {
            case 'radio':
                return new AnswerRadioFactory($answer);
                break;
            case 'text':
                return new AnswerTextFactory($answer);
                break;
            case 'checkbox':
                return new AnswerCheckboxFactory($answer);
                break;
            default:
                return new AnswerTextFactory($answer);
                break;
        }
    }
}
