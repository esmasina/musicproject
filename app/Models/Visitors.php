<?php
namespace App\Models;
use Eloquent;
class Visitors extends Eloquent {

protected $table = 'visitors';	
protected $fillable = ['name', 'email', 'user_id'];
	
	
}