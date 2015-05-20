<?php

class Candidate extends Eloquent {

	protected $table = 'candidates';
	protected $fillable = array('cname','job_title','sex','vote_id');


}

?>