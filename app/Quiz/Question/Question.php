<?php namespace App\Quiz\Question;

use Illuminate\Support\Facades\App;

class Question{

    protected $type    = '';
    protected $label   = '';
    protected $answers = [];
    protected QuestionRepositoryInterface $repository ;

    /**
     * Question constructor.
     * @param null $question
     */
    public function __construct($question, $repository)
    {
        $this->answers  = $question['answers'];
        $this->type     = $question['type'];
        $this->label    = $question['label'];
        $this->repository  = $repository;
    }

    /**
     * @return mixed
     */
    public function save(){
        return $this->repository->createAndSync([
            'type'  => $this->type,
            'label'  => $this->label,
        ],$this->answersToArray());
    }

    /**
     * @return mixed|string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed|string $type
     * @return Question
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return mixed|string
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * @param mixed|string $label
     * @return Question
     */
    public function setLabel($label)
    {
        $this->label = $label;
        return $this;
    }

    /**
     * @return array
     */
    public function getAnswers(): array
    {
        return $this->answers;
    }

    /**
     * @param array $answers
     * @return Question
     */
    public function setAnswers(array $answers): Question
    {
        $this->answers = $answers;
        return $this;
    }

    protected function answersToArray():array
    {
      	$answers = [];
        foreach($this->answers as $a)
          $answers[] = $a->toArray();
      	return $answers;
    }

    public function render(){
    }
}

