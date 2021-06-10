<?php namespace App\Repositories\EloquentRepositories\Presenters;

class QuizPresenter
{
    public function present($question):array
    {
        return $this->groupByQuestion($question);
    }

    protected function groupByQuestion($questions):array
    {
        $uniqueQuestions = [];
        $groupedQuestions = [];

        foreach ($questions as $question) {
            if (!in_array($question->questionLabel, $uniqueQuestions)) {
                $uniqueQuestions [] = $question->questionLabel;
                array_push($groupedQuestions, ['label' => $question->questionLabel,
                                                'type' => $question->questionType,
                                                'answers' => []
                                                ]
                );
            }
        }

        return $this->assignAnswers($questions, $groupedQuestions);
    }

    protected function assignAnswers($questions, $groupedQuestions):array
    {
        foreach ($questions as $question) {
            foreach ($groupedQuestions as &$groupedQuestion) {
                if ($question->questionLabel === $groupedQuestion['label']) {
                    $groupedQuestion['answers'] [] = ['label' => $question->answerLabel,
                                                    'is_valid' => $question->is_valid,
                                                    'id' =>  $question->id
                                                    ];
                }
            }
        }
    
        return $groupedQuestions;
    }

}
