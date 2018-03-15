@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-12">        
        <a href="tasks/create" class="btn btn-primary pull-right" style="margin:10px;">
            Add Task
        </a>
    </div>
</div>

<div class="row">
    <div class="col-md-12">

        <table class="table table-striped">

            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Date Created</th>
                    <th>Date to accomplish</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($tasks as $task)
                    <tr>
                        <td>{{ $task->name }}</td>
                        <td>{{ $task->description }}</td>
                        <td>{{ $task->created_at }}</td>
                        <td>{{ $task->date_accomplish }}</td>
                        <td>{{ $task->status }}</td>
                        <td>
                            <a href="{{action('TasksController@edit', $task['id'])}}" class="btn btn-primary" title="Edit">Edit</a>&nbsp;
                            <form action="{{action('TasksController@destroy', $task['id'])}}" method="post" style="display: inline-block;">
                                {{csrf_field()}}
                                <input name="_method" type="hidden" value="DELETE">
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>            
                @endforeach
            </tbody>

        </table>

    </div>

</div>


@endsection
