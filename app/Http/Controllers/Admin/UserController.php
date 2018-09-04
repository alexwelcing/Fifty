<?php

namespace App\Http\Controllers\Admin;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UsersRequest;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    var $active = 'users';
    var $title = 'users';
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application states.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$users = User::all();
        $active = $this->active;
        $title = $this->title;
        return view('admin.users.index', compact('users', 'active', 'title'));
    }


	/**
	* Show the form for creating a new create.
	*
	* @return \Illuminate\Http\Response
	*/
    public function create()
    {
    	$active = $this->active;
		$title = $this->title;
        return view('admin.users.create', compact('active', 'title'));
    }

	
	/**
	* Store a newly created resource in storage.
	*
	* @param StatesRequest $request
	* @return void
	*/
    public function store(UsersRequest $request)
    {
        //$state = User::create($request->all());
		
		$uploads = new User;
        		$uploads->fname = $request->fname;
        		$uploads->lname = $request->lname;
        		$uploads->email = $request->email;
				$uploads->roles_id = 2;
				$uploads->password = Hash::make($request->password);
        		$uploads->save();
				
				
        alert()->success("Success", "User {$uploads->fname} created!");
        return redirect()->route('users.index');
		
    }
	
	/**
	* Show the form for editing the specified resource.
	*
	* @param  \App\Models\States $state
	* @return \Illuminate\Http\Response
	*/
    public function edit(User $user)
    {
    	$active = $this->active;
		$title = $this->title;
        return view('admin.users.edit', compact('user', 'active', 'title'));
    }
	
	/**
	* Update the specified resource in storage.
	*
	* @param StatesRequest $request
	* @param  \App\Models\States $state
	* @return \Illuminate\Http\Response
	*/
    public function update(UsersRequest $request, User $user)
    {
        $user->update($request->all());
        alert()->warning("Success", "users {$user->name} updated!");
        return redirect()->route('users.index');
    }	

	/**
	* Remove the specified resource from storage.
	*
	* @param Request $request
	* @param  \App\Models\States $state
	* @return \Illuminate\Http\Response
	* @throws \Exception
	*/
    public function destroy(Request $request, User $user)
    {
		
    	alert()->error("Deleted", "User {$user->fname} deleted!");
        $user->delete();
        return redirect()->route('users.index');
    }



}
