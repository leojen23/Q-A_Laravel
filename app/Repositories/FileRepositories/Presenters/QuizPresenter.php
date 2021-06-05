<?php namespace App\Repositories\FileRepositories\Presenters;

class QuizPresenter
{
    public function present($question):array
    {
        // var_dump($question);
        return [
            'label' => $question['data']['label'],
            'type' => $question['type'],
            'answers' => $this->prepareAnswersArray($question['data'])
        ];
    }
    /**
     * @param $data
     * @return array
     */
    protected function prepareAnswersArray($data){
        $answers = $this->correctAnswerArray($data);
        if(isset($data['values'])){
            return $this->setAnswersValidity($answers, $data['values']);
        }else{
            return $this->setAnswersValid($answers);
        }
    }

    /**
     * @param $data
     * @param $values
     * @return array
     */
    protected function setAnswersValidity($data, $values){
        $array_valid_answer = [];
        foreach ($values as $value) {
            $array_valid_answer[] = [
                "label"=>$value,
                "is_valid" => $this->isValid($data,$value)
            ];
        }
        return $array_valid_answer;
    }


    /**
     * @param $data
     * @return array
     */
    protected function setAnswersValid($data){
        $array_valid_answer = [];
        foreach ($data as $answer) {
            $array_valid_answer[] = [
                "label"=>$answer,
                "is_valid"=>true
            ];
        }
        return $array_valid_answer;
    }


    /**
     * @param $answers
     * @param $value
     * @return bool
     */
    protected function isValid($answers, $value):bool{
        foreach($answers as $answer){
            if(preg_match('/'.$answer.'/i', $value)){
                return true;
            }
        }
        return false;
    }

    /**
     * @param $data
     * @return array|mixed
     */
    protected function correctAnswerArray($data){
        $answers = isset($data['answers']) ? $data['answers'] : $data['answer'];
        $answers = is_array($answers) ? $answers : [$answers];
        return $answers;
    }

}
