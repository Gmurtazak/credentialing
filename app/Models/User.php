<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * Class User
 *
 * @property int $id
 * @property string $name
 * @property Carbon|null $dob
 * @property string|null $gender
 * @property string $email
 * @property string $password
 * @property Carbon|null $email_verified_at
 * @property string|null $phone
 * @property string|null $address
 * @property string|null $country
 * @property string|null $state
 * @property string|null $city
 * @property string|null $remember_token
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int|null $department_id
 * @property int|null $team_id
 * @property int|null $report_to
 *
 * @property Collection|Department[] $departments
 * @property Collection|Project[] $projects
 * @property Collection|Right[] $rights
 * @property Collection|Role[] $roles
 * @property Collection|account_id[] $account_id
 * @package App\Models
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * @var string
     */
    protected $table = 'users';

    /**
     * @var string[]
     */
    protected $casts = [
		'department_id' => 'int',
		'team_id' => 'int',
		'report_to' => 'int'
	];

    /**
     * @var string[]
     */
    protected $dates = [
		'dob',
		'email_verified_at'
	];

    /**
     * @var string[]
     */
    protected $hidden = [
		'password',
		'remember_token'
	];

    /**
     * @var string[]
     */
    protected $fillable = [
		'name',
		'dob',
		'gender',
		'email',
		'password',
		'email_verified_at',
		'phone',
		'address',
		'country',
		'state',
		'city',
		'remember_token',
		'department_id',
		'team_id',
		'report_to',
		'portal_id',
		'account_id',
		'job_description_id'
	];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function departments()
	{
		return $this->hasMany(Department::class, 'owner_id');
	}

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function team()
    {
        return $this->belongsTo(Team::class, 'team_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function report()
    {
        return $this->belongsTo(User::class, 'report_to','id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function rights()
	{
		return $this->belongsToMany(Right::class, 'users_rights');
	}

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Role::class, 'users_roles', 'user_id', 'role_id');
    }
    public function jobDescription()
    {
        return $this->belongsTo(JobDescription::class,'job_description_id');
    }
    public function accounts(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Account::class, 'users_accounts', 'user_id', 'accounts_id');
    }
}
