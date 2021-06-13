<?php namespace App\Repositories\EloquentRepositories\Presenters;

class QuizPresenter
{
    //this method returns an array of question data formatted as needed 
    public function present($answersAndQuestions):array
    {
        return $this->extractQuestions($answersAndQuestions);
    }

    //loops through the array of questions and answers retrieved from database to return an array formatted as required to be send to the factory. 
    protected function extractQuestions($answersAndQuestions):array
    {
        $uniqueQuestions = [];
        $groupedQuestions = [];

        foreach ($answersAndQuestions as $answersAndQuestion) {
            if (!in_array($answersAndQuestion->questionLabel, $uniqueQuestions)) {
                $uniqueQuestions [] = $answersAndQuestion->questionLabel;
                array_push($groupedQuestions, ['label' => $answersAndQuestion->questionLabel,
                                                'type' => $answersAndQuestion->questionType,
                                                'answers' => []
                                                ]
                );
            }
        }

        return $this->assignAnswers($answersAndQuestions, $groupedQuestions);
    }

    //assigns answers to each questions and returns them into an array
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
