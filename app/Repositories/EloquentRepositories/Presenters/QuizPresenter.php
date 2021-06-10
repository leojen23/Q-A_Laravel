<?php namespace App\Repositories\EloquentRepositories\Presenters;

class QuizPresenter
{
    //je pense qu'on doit avoir un objet Collection en param
    public function present($question):array
    {
        return [
            'label' => $question->questionLabel,
            'type' => $question->questionType,
            'answers' => [
                    [
                        'label' => $question->answerLabel,
                        'is_valid' => $question->is_valid,
                    ]
            ]
        ];
    }

}
