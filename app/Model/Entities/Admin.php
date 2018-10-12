<?php 

namespace App\Model\Entities;

use App\Model\Presenters\AdminPresenter;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Model\Scopes\Base\BaseScope;
use Illuminate\Support\Facades\Hash;
use App\Model\Base\Auth;

/**
 * 
 */
class Admin extends Auth
{
	use Notifiable;
	use AdminPresenter;

	protected $table = 'admin';
	protected $primaryKey = 'id';
	protected $fillable = ['name', 'email', 'password', 'birth_day', 'avatar', 'role_type', 'ins_id', 'upd_id', 'del_flag'];
	protected $_alias = 'admin';

	// Add global scope
	protected static function boot() 
	{
		parent::boot();
		static::addGlobalScope(new BaseScope);
	}

	public function setPasswordAttribute($value) 
	{
		$this->attributes['password'] = Hash::make($value);
	}

	public function setBirthDayAttribute($value) 
	{
		$this->attributes['birth_day'] = date('Y-m-d', strtotime($value));
	}

	public function getBirthDayAttribute() 
	{
		return date('m/d/Y', strtotime($this->attributes['birth_day']));
	}
}
?>