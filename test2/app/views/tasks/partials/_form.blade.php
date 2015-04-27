{{ Form::open(['url' => '/votes', 'class' => 'form']) }}
	  <input type="text" class="form-control" placeholder="校名...." autofocus required
                     name="school_name" />
                     <input type="text" class="form-control" placeholder="投票名稱...." autofocus required
                      name="vote_title" /> 
                     <input type="text" class="form-control" placeholder="投票人數...." autofocus required
                       name="vote_amount" />
                     <input type="text" class="form-control" placeholder="開始時間...." autofocus required
                        name="start_at" /> 
                     <input type="text" class="form-control" placeholder="結束時間...." autofocus required
                         name="end_at" />

                     <input type="text" class="form-control" placeholder="當選人數...." autofocus required
                       name="vote_goal" />      
                     <input type="text" class="form-control" placeholder="可投票數...." autofocus required
                         name="can_select" />  

                     <input type="text" class="form-control" placeholder="建立者職稱...." autofocus required
                     name="builder_title" />                                                
                    <input type="submit"  />
{{ Form::close() }}

<input class="form-control" name="title" type="text" id="title">	