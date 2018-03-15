@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-12">        
        <a href="users/create" class="btn btn-primary pull-right" style="margin:10px;">
            Add User
        </a>
    </div>
</div>

<div class="row">
    <div class="col-md-12">

        <table class="table table-striped">

            <thead>
                <tr>
                    <th>Email</th>
                    <th>Name</th>
                    <th>Date Created</th>
                    <th>Date Modified</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->created_at }}</td>
                        <td>{{ $user->updated_at }}</td>
                        <td>
                            <a href="{{action('UsersController@edit', $user['id'])}}" class="btn btn-primary" title="Edit">Edit</a>&nbsp;
                            <form action="{{action('UsersController@destroy', $user['id'])}}" method="post" style="display: inline-block;">
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
