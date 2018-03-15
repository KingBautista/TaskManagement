<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Users Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    | 
    */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()

    {

        $this->middleware('auth');

    }

    
    /**
     * 
     *
     * 
     * @return 
     */
    public function index()

    {
    	$users = User::orderBy('created_at', 'desc')->get();
    	$params = [
    		'users' => $users, 
        ];

    	return view('users.index', $params);

    }

    /**
     * 
     *
     * 
     * @return 
     */
	public function create()

	{

    	return view('users.create');

	}


    /**
     * 
     *
     * 
     * @return 
     */	
	public function store(Request $request)

	{
		// validate request
        $this->validate(request(),[
		    'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'role' => 'required',
		]);

		// set value for saving
	   	$user = new User([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => bcrypt($request->get('password')),
            'role' => $request->get('role'),
            'created_at' => date("Y-m-d H:i:s")
        ]);

        // save user to table
        $user->save();

        // redirect to user
        return redirect('/users');

	}

    /**
     * 
     *
     * 
     * @return 
     */
	public function edit($id)

	{
		// Find user by id
        $User = User::find($id);

        $params = [
        	'user' => $User, 
            'id' => $id
    	];

        // return edit view
        return view('users.edit', $params);		

	}


    /**
     * 
     *
     * 
     * @return 
     */
	public function update(Request $request, $id)

    {
    	 // validate request
        $this->validate(request(),[
		    'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'role' => 'required',
		]);

		$User = User::find($id);

        // Set new value
        $User->name = $request->get('name');
        $User->email = $request->get('email');
        $User->role = $request->get('role');
        $User->updated_at = date("Y-m-d H:i:s");

        // save updated user
        $User->save();

        // Redirect to index page
        return redirect('/users'); 

    }


    /**
     * 
     *
     * 
     * @return 
     */
	public function destroy($id)

    {
    	
		$User = User::find($id);
		$User->delete();

	    // Redirect to index page
        return redirect('/users'); 
    }


}
