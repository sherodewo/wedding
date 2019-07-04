<?php
/**
 * Created by PhpStorm.
 * User: huzairuje
 * Date: 18/03/19
 * Time: 16:11
 */

namespace App\Services\Backend\Role;

use App\Http\Requests\Backend\Role\CreateRoleRequest;
use App\Models\Role;

class RoleService
{
    private $role;

    public function __construct(Role $role)
    {
        $this->role = $role;
    }

    public function storeRole(CreateRoleRequest$request)
    {
        $data = $this->role;
        $data->name = $request->name;
        $data->description = $request->description;

        $data->save();
        return $data;
    }

    public function findById($id)
    {
        $data = $this->role->find($id);
        return $data;
    }

    public function deleteRole($id)
    {
        $data = $this->role->find($id);
        $data->delete();
        return $data;
    }
}
