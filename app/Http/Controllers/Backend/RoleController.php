<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Role\CreateRoleRequest;
use App\Models\Role;
use App\Services\Backend\Role\RoleService;
use function foo\func;
use Illuminate\Http\Request;
use Datatables;

class RoleController extends Controller
{
    private $roleService;

    public function __construct(RoleService $roleService)
    {
        $this->roleService = $roleService;
    }

    /** get data table to show on method @index
     * @return mixed
     */
    public function dataTables()
    {
        $role = numrows(Role::all());
        return Datatables::of($role)
            ->addColumn('action', function ($role) {
                return
                '<a href="'.route('role.show', $role->id).'" class="btn btn-primary btn-circle btn-sm "><i class="fas fa-search"></i></a>
                <a href="'.route('role.edit', $role->id).'" class="btn btn-success btn-circle btn-sm"><i class="fas fa-edit"></i></a>
                <a href="'.route('role.delete', $role->id).'" class="btn btn-danger btn-circle btn-sm "><i class="fas fa-trash"></i></a>';
            })
            ->make(true);

    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin.backend.roles.index');
    }

    /** Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.backend.roles.create');
    }

    /**
     * @param CreateRoleRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateRoleRequest $request)
    {
        $this->roleService->storeRole($request);
        return redirect()->route('role.index')
            ->with('success','role created successfully.');
    }

    /**
     * @param Role $role
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Role $role)
    {
        return view('admin.backend.roles.show',compact('role'));
    }

    /**
     * @param Role $role
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Role $role)
    {
        return view('admin.backend.roles.edit',compact('role'));
    }

    /**
     * @param Request $request
     * @param Role $role
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name'=>'required',
            'description'=> 'required'
          ]);

        $role->update($request->all());
    
          return redirect('/role')->with('success', 'Role has been updated');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $this->roleService->deleteRole($id);
        return redirect()->route('role.index')
            ->with('success','role deleted successfully');
    }
}
