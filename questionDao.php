<?php
interface questionDao{
    public function createquestion($q,$b,$userid,$qid);
    
    public function getquestion();
    
    public function create_question($b);
}
?>