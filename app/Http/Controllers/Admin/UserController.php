<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\http\Requests\AddUserRequest;
use Illuminate\Support\Facades\DB;
use App\Entities\User;
use GuzzleHttp\Client;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('roles')->
            // ->where('email','like', '%@gmail.com')
            // ->limit(2) //->skip(1)
            // ->offset(1) //->take(2)
        get();
        // $user = DB::table('users')
        //     ->where('email','like', '%@gmail.com')
        // ->first();
        // print_r($users);
    //     DB::table('users')->whereName('Name')->update([
    //             //
    //         ]);
    //     DB::table('users')->whereName('abc')->update([
    //         'email' => 'abc@gmail.com',
    //         'password' => 'abc123',
    //         'created_at' => now(),
    //         'updated_at' => now()

    //    ]);
        // $users = DB::table('users')->where('email', '=', 'boss@mail.com')->first();
        // print_r($users);
        // die();
        // debugbar()->info($users);
        // debugbar()->info($user);

        // print_r($reponse->getBody()->getContents());
        return view('admin.users.index',compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(AddUserRequest $r)
    {
        $input = $r->only([
            'name',
            'email',
            'phone',
            'address',
            'password'
        ]);
        $user = User::create($input);
        return redirect("/admin/users/{$user->id}/edit");
    }

    public function edit(User $user)
    {
        return view('admin.users.edit',compact('user'));
    }

    public function update(AddUserRequest $r, $user)
    {
        $input = $r->only([
            'name',
            'email',
            'phone',
            'address',
            'password'
        ]);
        $user = User::findOrFail($user);
        $user->fill($input);
        $user->save();
        return back();
    }

    public function destroy()
    {
        //
    }
}
