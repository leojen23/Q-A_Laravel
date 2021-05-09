<?php namespace App\Quiz\Answer;

abstract class Answer{


    protected $label = '';

    protected $is_valid = '';

    protected $id = '';

    /**
     * Answer constructor.
     * @param null $answer
     */
    public function __construct($answer)
    {
      $this->label= $answer['label'];
      $this->is_valid= $answer['is_valid'];
      $this->id= $answer['id'] ?? '';
    }

    /**
     * @return array
     */
    public function toArray():array
    {
        return [
            'label' => $this->label,
            'is_valid' => $this->is_valid,
            'id' => $this->id,
        ];
    }

   abstract public function render();

}
