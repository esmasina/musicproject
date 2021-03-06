<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Authenticable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Hash;


class User extends Model implements  AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';
	/**
	 * The attributes that are mass assignable.
	 *add password_confirmed
	 * @var array
	 */
	protected $fillable = ['name', 'email', 'password'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];


    //Hash password
 	public function setPasswordAttribute($password)
	{
     $this->attributes['password'] = Hash::make($password);
	}


	//Create one-to-one realationship beetwen the users and the profile tables
	public function profile()
	{
		return $this->hasOne('Profile');
	}

	public function uploadedfile()
	{
		return $this->hasMany('')->get();
	}


    //Functions that check if user
	public function thisUser()
	{
		//If guest - do nothing
		if (Auth::guest()) return false;

		return Auth::user()->id == $this->id;
	}

}
