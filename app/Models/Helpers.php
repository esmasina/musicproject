<?php

class Message
{

public function errors_for($attribute, $errors)
{
 return $errors->first($attribute, '<span class="error">:message</span>');
}

function link_to_profile($text = 'Profile')
{
	return link_to('/'. Auth::user()->username, $text);
}

}
