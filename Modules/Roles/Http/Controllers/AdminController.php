<?php

namespace Modules\Roles\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;


class AdminController extends Controller {

    public function index(){
         $roles = Role::all();
         $index_roles = 'show';
         $permissions = Permission::all();

         return view('roles::admin.index' , compact('roles' ,'index_roles' , 'permissions'));
    }

    public function store(Request $request){
        $request->validate([
            'role_name' => 'required'
        ]);
        $role = Role::create(['name' => $request->input('role_name')]);
        $permissions = $request->input('permissions');
        if (!is_null($permissions)){
            $role->syncPermissions($permissions);
        }

        session()->flash('alert', ['class' => 'success', 'msg' => __('admin.TheOpreationDoneSuccessFully')]);
        return back();
    }

     public function show($id){
        $role = Role::findById($id);
        $users = User::whereDoesntHave('roles')
            ->where('type', 'admin')
            ->get();

        $permissions = Permission::all();
        return view('roles::admin.view' , compact('role' ,'users' , 'permissions'));
    }

    public function update(Request $request){
        $request->validate([
            'role_name' => 'required'
        ]);
        $id = $request->get('id');
        $role = Role::findById($id);
        $role->name = $request->input('role_name');
        $role->save();
        $permissions = $request->input('permissions');
        if (!is_null($permissions)){
            $role->syncPermissions($permissions);
        }

        session()->flash('alert', ['class' => 'success', 'msg' => __('admin.TheOpreationDoneSuccessFully')]);
        return back();
    }

    public function assignUsersToRole(Request $request)
    {
    // Retrieve the selected user IDs from the form
    $userIds = $request->input('user_ids');

    // Retrieve the target role
    $role = Role::findOrFail($request->input('role_id'));

    // Retrieve the selected users
    $users = User::whereIn('id', $userIds)->get();

    // Assign the users to the role
    $role->users()->attach($users);

    // Optionally, you can perform additional actions or return a response
     session()->flash('alert', ['class' => 'success', 'msg' => __('admin.TheOpreationDoneSuccessFully')]);
     return back();
    }

        public function removeUsersFromRole(Request $request)
        {

            // Retrieve the selected user IDs from the form
            $userIds = $request->input('usersIds');

            // Retrieve the target role
            $role = Role::findOrFail($request->input('role_id'));

            // Detach the selected users from the role
            $role->users()->detach($userIds);

            // Optionally, you can perform additional actions or return a response
            session()->flash('alert', ['class' => 'success', 'msg' => __('admin.TheOpreationDoneSuccessFully')]);
            return back();
        }

        public function removeUserFromRole(Request $request)
        {

            // Retrieve the target user
            $user = User::findOrFail($request->input('user_id'));

            // Retrieve the target role
            $role = Role::findOrFail($request->input('role_id'));

            // Detach the user from the role
            $user->roles()->detach($role);

            // Optionally, you can perform additional actions or return a response
            return response()->json(['success' => 'User removed from role successfully.']);
        }

}
