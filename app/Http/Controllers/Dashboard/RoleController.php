<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Role;
use App\Http\Requests\RoleRequest;
use Illuminate\Routing\Controller;
use Spatie\Permission\Models\Permission;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class RoleController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * PageController constructor.
     */
    public function __construct()
    {
        $this->authorizeResource(Role::class, 'role');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $roles = Role::where('name', '!=', 'admin')->get();

        return view('dashboard.roles.index', compact('roles'));
    }

    public function create()
    {
        $types = __('users.types');
        $permissions = Permission::all();

        $tables = app_get_table_names();

        $title_pre = [];
        for ($i = 0; $i < sizeof($tables); $i++) {
            foreach ($permissions as $permission) {
                if ($tables[$i]['title'] == $permission->type) {
                    $title_pre[$tables[$i]['title']][] = $permission->name;
                }
            }
        }

        return view('dashboard.roles.create', compact('title_pre', 'types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\RoleRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(RoleRequest $request)
    {
        $role = Role::create(['name' => $request->name]);
        if (!auth()->user()->isAdmin()) {
            $role->forceFill(['user_id' => auth()->id()])->save();
        }

        $requested_permissions = $request->except('name', '_token');

        foreach ($requested_permissions as $key => $perm) {
            $permission = Permission::findByName(str_replace("_", " ", $key));

            $permission->assignRole($role);
        }

        flash(trans('roles.messages.created'));

        return redirect()->route('dashboard.roles.show', $role);
    }

    /**
     * Display the specified resource.
     *
     * @param \Spatie\Permission\Models\Role $role
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Role $role)
    {
        return view('dashboard.roles.show', compact('role'));
    }

    /**
     * Edit role.
     *
     * @param Role $role
     * @return void
     */
    public function edit(Role $role)
    {
        $types = __('users.types');
        $role_permission = $role->permissions->pluck('name')->toArray();
        $permissions = Permission::all();

        $tables = app_get_table_names();
        $title_pre = [];

        for ($i = 0; $i < sizeof($tables); $i++) {
            foreach ($permissions as $permission) {
                if ($tables[$i]['title'] == $permission->type) {
                    $title_pre[$tables[$i]['title']][] = $permission->name;
                }
            }
        }

        return view('dashboard.roles.edit', compact('types', 'role', 'role_permission', 'title_pre'));
    }

    /**
     * Update role.
     *
     * @param RoleRequest $request
     * @param Role $role
     * @return void
     */
    public function update(RoleRequest $request, Role $role)
    {
        $requested_permissions = $request->except('name', '_token', '_method');
        $role->update(['name' => $request->name]);
        $role_permission = $role->permissions->pluck('name')->toArray();
        $role->revokePermissionTo($role_permission);

        foreach ($requested_permissions as $key => $perm) {
            $permission = Permission::findByName(str_replace("_", " ", $key));

            $permission->assignRole($role);
        }

        flash(trans('roles.messages.updated'));

        return redirect()->route('dashboard.roles.show', $role);
    }

    /**
     * Destroy role.
     *
     * @param Role $role
     * @return void
     */
    public function destroy(Role $role)
    {
        $role->syncPermissions();

        $role->delete();

        flash(trans('roles.messages.deleted'));

        return redirect()->route('dashboard.roles.index');
    }
}
