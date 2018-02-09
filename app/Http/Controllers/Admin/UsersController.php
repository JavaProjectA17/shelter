<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = new User();
        $queries = null;

        if (request()->has('sortByName')) {
            $users = $users->orderBy('name', request('sortByName'));
            $queries = request('sortByName');
        } else if (request()->has('sortByEmail')) {
            $users = $users->orderBy('email', request('sortByEmail'));
            $queries = request('sortByEmail');
        } else if (request()->has('sortByBanned')) {
            $users = $users->orderBy('banned', request('sortByBanned'));
            $queries = request('sortByBanned');
        } else if (request()->has('sortByRole')) {
            $users = $users->orderBy('role', request('sortByRole'));
            $queries = request('sortByRole');
        }

        $users = $users->paginate(10)->appends($queries);

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::add($request->all());
        return redirect()->route('admini.users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::find($id);
        return view('admin.users.edit', compact('users'));
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
        $users = User::find($id);
        $users->update($request->all());
        $users->bcryptPassword($request->get('password'));

        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.users.index')->with(['message' => 'User "'. $user->name . '" deleted successfully']);
    }

    public function bane(Request $request, $id) {
        $user = User::findOrFail($id);
        $user->banned = !$user->banned;
        $user->save();
        $user->update($request->all());

        if ($user->banned)
            return redirect()->route('admin.users.index')->with(['message' => 'User "' . $user->name . '" baned successfully']);
        else
            return redirect()->route('admin.users.index')->with(['message' => 'User "' . $user->name . '" unban successfully']);
    }
}
