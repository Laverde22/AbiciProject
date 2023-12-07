<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Crear Roles

        $role1 = Role::create(['name'=>'admin']);
        $role2 = Role::create(['name'=>'user']);
        $role3 = Role::create(['name'=>'domi']);
        $user = User::find(3);
        $user->assignRole($role1);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
