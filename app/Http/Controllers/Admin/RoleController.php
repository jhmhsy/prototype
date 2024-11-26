<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('permission:role-list|role-create|role-edit|role-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:role-view');
        $this->middleware('permission:role-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:role-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:role-delete', ['only' => ['destroy']]);



        // Overview and Checkin Management
        $this->middleware('permission:overview-list', ['only' => ['index']]);

        $this->middleware('permission:checkin-list', ['only' => ['index']]);
        $this->middleware('permission:checkin-edit', ['only' => ['checkin']]);
        $this->middleware('permission:checkin-log-list', ['only' => ['history']]);

        // Member Management
        $this->middleware('permission:member-create', ['only' => ['memberCreate', 'storeMember']]);
        $this->middleware('permission:member-list', ['only' => ['memberIndex']]);
        $this->middleware('permission:member-edit', ['only' => ['memberEdit', 'updateMember']]);
        $this->middleware('permission:member-membership-renew', ['only' => ['renewMembership']]);

        // Subscription Management
        $this->middleware('permission:subscription-create', ['only' => ['subscriptionCreate', 'storeSubscription']]);
        $this->middleware('permission:subscription-extend', ['only' => ['extendSubscription']]);
        $this->middleware('permission:subscription-end', ['only' => ['endSubscription']]);



        // Locker Management
        $this->middleware('permission:locker-create', ['only' => ['createLocker', 'storeLocker']]);
        $this->middleware('permission:locker-extend', ['only' => ['extendLocker']]);
        $this->middleware('permission:locker-end', ['only' => ['endLocker']]);


        // Treadmill Management
        $this->middleware('permission:treadmill-create', ['only' => ['createTreadmill', 'storeTreadmill']]);
        $this->middleware('permission:treadmill-extend', ['only' => ['extendTreadmill']]);
        $this->middleware('permission:treadmill-end', ['only' => ['endTreadmill']]);

        // Price Management
        $this->middleware('permission:price-view|price-edit', ['only' => ['index']]);
        $this->middleware('permission:price-edit', ['only' => ['update']]);

        // Reservation 
        $this->middleware('permission:reservation-list', ['only' => ['index']]);

        //Equipment Management
        $this->middleware('permission:equipment-list|equipment-view|equipment-create|equipment-edit|equipment-delete', ['only' => ['index']]);
        $this->middleware('permission:equipment-view');
        $this->middleware('permission:equipment-create', ['only' => ['store']]);
        $this->middleware('permission:equipment-edit', ['only' => ['update']]);
        $this->middleware('permission:equipment-delete', ['only' => ['destroy']]);

        // Event Management
        $this->middleware('permission:event-list|event-view|event-create|event-edit|event-delete', ['only' => ['index']]);
        $this->middleware('permission:event-view');
        $this->middleware('permission:event-create', ['only' => ['store']]);
        $this->middleware('permission:event-edit', ['only' => ['update']]);
        $this->middleware('permission:event-delete', ['only' => ['destroy']]);

        // User Management
        $this->middleware('permission:user-list|user-view|user-create|user-edit|user-delete', ['only' => ['index']]);
        $this->middleware('permission:user-view');
        $this->middleware('permission:user-create', ['only' => ['store', 'create']]);
        $this->middleware('permission:user-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:user-delete', ['only' => ['destroy']]);

        // Feedback and Help
        $this->middleware('permission:feedback-list', ['only' => ['feedbackIndex']]);
        $this->middleware('permission:help-list', ['only' => ['helpIndex']]);

        $this->middleware('permission:faq-list', ['only' => ['index']]);

        // ProductSales
        $this->middleware('permission:productsales-list|productsales-view|productsales-create|productsales-edit|productsales-delete', ['only' => ['index']]);
        $this->middleware('permission:faq-view');
        $this->middleware('permission:faq-create', ['only' => ['store']]);
        $this->middleware('permission:faq-edit', ['only' => ['update']]);
        $this->middleware('permission:faq-delete', ['only' => ['destroy']]);

        $this->middleware('permission:asset-list', ['only' => ['index']]);

        $this->middleware('permission:dailysales-list', ['only' => ['index']]);

        $this->middleware('permission:productsales-list', ['only' => ['index']]);

        $this->middleware('permission:confirmation-list', ['only' => ['index']]);



    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request): View
    {

        // if (!auth()->user()->canany(['role-list', 'role-view', 'role-create', 'role-edit', 'role-delete'])) {
        //     abort(404); // forbidden / not found
        // }

        // Filter out specific roles and their permissions
        $roles = Role::with([
            'permissions' => function ($query) {
                $query->whereNotIn('name', ['role-list', 'role-edit', 'role-create', 'role-view', 'role-delete']);
            }
        ])
            ->whereNotIn('name', ['role-list', 'role-edit', 'role-create', 'role-view', 'role-delete'])
            ->orderBy('id', 'asc')
            ->paginate(50);

        // Get all permissions excluding specific roles
        $permissions = Permission::whereNotIn('name', ['role-list', 'role-edit', 'role-create', 'role-view', 'role-delete'])->get();
        $permissioncreate = $permissions; // Reuse the filtered permissions list for creating roles

        // Pass data to the view
        return view('administrator.roles.index', compact('roles', 'permissions', 'permissioncreate'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        $permission = Permission::get();

        return view('administrator.roles.create', compact('permission'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'name' => 'required|unique:roles,name',
            'permission' => 'required',
        ]);

        $permissionsID = array_map(
            function ($value) {
                return (int) $value;
            },
            $request->input('permission')
        );

        $role = Role::create(['name' => $request->input('name')]);
        $role->syncPermissions($permissionsID);

        return redirect()->route('roles.index')
            ->with('success', 'Role created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id): View
    {
        $role = Role::find($id);
        $rolePermissions = Permission::join('role_has_permissions', 'role_has_permissions.permission_id', '=', 'permissions.id')
            ->where('role_has_permissions.role_id', $id)
            ->get();

        return view('administrator.roles.show', compact('role', 'rolePermissions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id): View
    {
        $role = Role::find($id);
        $permission = Permission::get();
        $rolePermissions = DB::table('role_has_permissions')->where('role_has_permissions.role_id', $id)
            ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
            ->all();

        return view('administrator.roles.edit', compact('role', 'permission', 'rolePermissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $this->validate($request, [
            'name' => 'required',
            'permission' => 'required',
        ]);

        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->save();

        $permissionsID = array_map(
            function ($value) {
                return (int) $value;
            },
            $request->input('permission')
        );

        $role->syncPermissions($permissionsID);

        return redirect()->route('roles.index')
            ->with('success', 'Role updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id): RedirectResponse
    {
        $role = Role::find($id);
        if (!$role) {
            return redirect()->route('roles.index')
                ->with('error', 'Role not found');
        }

        DB::table('roles')->where('id', $id)->delete();

        return redirect()->route('roles.index')
            ->with('success', 'Role deleted successfully');
    }

}