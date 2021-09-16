<?php
class Home extends controller 
{
    public function index()
    {
       $this->views->getView($this,"index");
    }

}

?>