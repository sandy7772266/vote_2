<?php

class Vote extends Eloquent {

	protected $table = 'votes';
	//protected $fillable = array('school_no','school_name','vote_title','vote_amount','start_at','end_at','vote_goal','can_select','builder_name');
	protected $fillable = array('vote_title','vote_amount','start_at','end_at','vote_goal','can_select');


}

?>