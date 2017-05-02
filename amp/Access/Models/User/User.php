<?php

namespace Amp\Access\Models\User;

use Illuminate\Notifications\Notifiable;
use Amp\Access\Models\User\Traits\UserAccess;
use Illuminate\Database\Eloquent\SoftDeletes;
use Amp\Access\Models\User\Traits\Scope\UserScope;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Amp\Access\Models\User\Traits\UserSendPasswordReset;
use Amp\Access\Models\User\Traits\Attribute\UserAttribute;
use Amp\Access\Models\User\Traits\Relationship\UserRelationship;

/**
 * Class User.
 */
class User extends Authenticatable
{
    use UserScope,
        UserAccess,
        Notifiable,
        SoftDeletes,
        UserAttribute,
        UserRelationship,
        UserSendPasswordReset;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password', 'status', 'confirmation_code', 'confirmed'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = config('wbp.access.users_table');
    }
}
