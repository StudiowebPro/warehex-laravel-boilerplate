<?php

namespace Amp\Access\Models\Role;

use Illuminate\Database\Eloquent\Model;
use Amp\Access\Models\Role\Traits\RoleAccess;
use Amp\Access\Models\Role\Traits\Scope\RoleScope;
use Amp\Access\Models\Role\Traits\Attribute\RoleAttribute;
use Amp\Access\Models\Role\Traits\Relationship\RoleRelationship;

/**
 * Class Role.
 */
class Role extends Model
{
    use RoleScope,
        RoleAccess,
        RoleAttribute,
        RoleRelationship;

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
    protected $fillable = ['name', 'all', 'sort'];

    /**
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = config('wbp.access.roles_table');
    }
}
