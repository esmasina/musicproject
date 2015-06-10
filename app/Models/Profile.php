<?php

class Profile extends Eloquent 
{
 
protected $fillable = ['location', 'preferences', 'information'];
	
	public function user()
	{
		return $this->belonsTo('User');
	}
}