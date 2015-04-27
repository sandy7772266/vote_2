<?php

class Vote extends Eloquent {

	protected $table = 'votes';
	protected $fillable = array('school_name','vote_title','vote_amount','start_at','end_at','vote_goal','can_select','builder_title');


}

?>