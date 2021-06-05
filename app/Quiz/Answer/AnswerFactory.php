<?php

use App\Models\Answer;
use App\Quiz\Interfaces\IFactory;

class AnwserFactory implements IFactory{

    protected function create(){
        $label= ['bla'];
        $isValid = true;
        $id=5;

        return new Answer($label, $isValid, $id);
        
    }
    
    public function get(){
        return $this->create();
    }
}