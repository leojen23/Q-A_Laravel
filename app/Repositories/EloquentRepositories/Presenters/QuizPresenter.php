<?php namespace App\Repositories\EloquentRepositories\Presenters;

class QuizPresenter
{
    //je pense qu'on doit avoir un objet Collection en param
    public function present($questions):array
    {
    
        return ($this->groupByQuestion($questions));
    }


    protected function groupByQuestion($questions):array {
    
        $uniqueQuestions = [];
        $groupedQuestions = [];


        foreach ($questions as $question){
            if(!in_array($question->questionLabel, $uniqueQuestions)){
                $uniqueQuestions [] = $question->questionLabel;
                $groupedQuestions [] = [
                    'label' => $question->questionLabel,
                    'type' => $question->questionType,
                    'answers' => []
                ];
            } 
        }

        return $this->assignAnswers($questions, $groupedQuestions);
    }


    protected function assignAnswers($questions, $groupedQuestions){

        foreach($questions as $question){
            // & pour modifier le tableau référencé en mémoire et non celui du foreach au dessus
            foreach($groupedQuestions as &$groupedQuestion){
                if($question->questionLabel === $groupedQuestion['label']){
                    $groupedQuestion['answers'][] = [
                        'label' =>$question->answerLabel,
                        'is_valid' => $question->is_valid,
                        'id' => $question->id
                    ];
                }
            }
        }
        return $groupedQuestions;
    }

}
