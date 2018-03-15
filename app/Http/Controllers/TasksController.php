<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Task;

class TasksController extends Controller
{
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
        $tasks = Task::where('user_id',Auth::user()->id)->orderBy('created_at', 'desc')->get();
        $params = [
            'tasks' => $tasks, 
        ];

        return view('tasks.index', $params);

    }

    /**
     * 
     *
     * 
     * @return 
     */
	public function create()

	{

        return view('tasks.create');

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
            'description' => 'required|string',
            'date_accomplish' => 'required',
            'status' => 'required',
        ]);

        // set value for saving
        $task = new Task([
            'user_id' => $request->get('user_id'),            
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'date_accomplish' => $request->get('date_accomplish'),
            'status' => $request->get('status'),
        ]);

        // save user to table
        $task->save();

        // redirect to user
        return redirect('/tasks');

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
        $task = Task::find($id);

        $params = [
            'task' => $task, 
            'id' => $id
        ];

        // return edit view
        return view('tasks.edit', $params); 

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
            'description' => 'required|string',
            'date_accomplish' => 'required',
            'status' => 'required',
        ]);

        $task = Task::find($id);

        // Set new value
        $task->name = $request->get('name');
        $task->description = $request->get('description');
        $task->date_accomplish = $request->get('date_accomplish');
        $task->status = $request->get('status');
        $task->updated_at = date("Y-m-d H:i:s");

        // save updated user
        $task->save();

        // Redirect to index page
        return redirect('/tasks'); 

    }


    /**
     * 
     *
     * 
     * @return 
     */
	public function destroy($id)

    {

        $Task = Task::find($id);
        $Task->delete();

        // Redirect to index page
        return redirect('/tasks'); 

    }
}
