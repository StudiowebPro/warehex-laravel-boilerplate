<?php

namespace Amp\Access\Models\Permission\Traits\Relationship;

/**
 * Class PermissionRelationship.
 */
trait PermissionRelationship
{
    /**
     * @return mixed
     */
    public function roles()
    {
        return $this->belongsToMany(config('wbp.access.role'), config('wbp.access.permission_role_table'), 'permission_id', 'role_id');
    }
}
