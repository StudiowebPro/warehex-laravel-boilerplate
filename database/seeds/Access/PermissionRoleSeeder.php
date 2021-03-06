<?php

use Database\TruncateTable;
use Illuminate\Database\Seeder;
use Amp\Access\Models\Role\Role;
use Database\DisableForeignKeys;

/**
 * Class PermissionRoleSeeder.
 */
class PermissionRoleSeeder extends Seeder
{
    use DisableForeignKeys, TruncateTable;

    /**
     * Run the database seed.
     *
     * @return void
     */
    public function run()
    {
        $this->disableForeignKeys();
        $this->truncate(config('wbp.access.permission_role_table'));

        /*
         * Assign view backend to executive role as example
         */
        Role::find(2)->permissions()->sync([1]);

        $this->enableForeignKeys();
    }
}
