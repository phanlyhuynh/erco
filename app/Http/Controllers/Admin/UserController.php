<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UserFormRequest;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $users = User::result();
        $keyword = $request->keyword;
        if ($request->has('keyword'))
        {
            $users = $users->search($keyword);
        }
        $users = $users->orderById('ASC');

        return view('admin.user.index', compact('users', 'keyword'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserFormRequest $request)
    {
        $user = new User();
        $filename = '';
        if ($request->hasFile('avatar'))
        {
            $file = $request->file('avatar');
            $filename = $file->getClientOriginalName();
            $dir = public_path('uploads/user/avatar');
            $file->move($dir, $filename);
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->passowrd);
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->role = $request->role;
        $user->avatar = $filename;

        $user->save();

        return redirect('admin/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);

        return view('admin.user.profile', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('admin.user.editprofile', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
