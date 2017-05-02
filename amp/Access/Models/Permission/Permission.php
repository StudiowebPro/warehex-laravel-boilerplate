<?php

namespace Amp\Access\Models\Permission;

use Illuminate\Database\Eloquent\Model;
use Amp\Access\Models\Permission\Traits\Relationship\PermissionRelationship;

/**
 * Class Permission.
 */
class Permission extends Model
{
    use PermissionRelationship;

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
    protected $fillable = ['name', 'display_name', 'sort'];

    /**
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = config('wbp.access.permissions_table');
    }
}
