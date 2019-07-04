<?php
/**
 * Created by PhpStorm.
 * User: huzairuje
 * Date: 2/27/19
 * Time: 4:48 PM
 */

namespace App\Services\Backend\User;


use App\Http\Requests\Backend\User\CreateUserRequest;
use App\Models\User;

class UserService
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function storeUser(CreateUserRequest $request)
    {
        $data = $this->user;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = $request->password;
        $data->save();
        return $data;
    }

    public function findById($id)
    {
        $data = $this->user->find($id);
        return $data;
    }

    public function deleteUser($id)
    {
        $data = $this->user->find($id);
        $data->delete();
        return $data;
    }
}
