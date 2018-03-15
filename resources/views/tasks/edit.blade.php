@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Task</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{action('TasksController@update', $id)}}">
                        {{ csrf_field() }}

                        <input name="_method" type="hidden" value="PATCH">

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{$task->name}}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="description" class="col-md-4 control-label">Description</label>

                            <div class="col-md-6">
                                <textarea class="form-control" name="description" id="description" rows="4">
                                    {{$task->description}}
                                </textarea>

                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                                
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="date_accomplish" class="col-md-4 control-label">Date to Accomplish</label>

                            <div class="col-md-6">
                                <input type="date_accomplish" name="date_accomplish" class="form-control" value="{{$task->date_accomplish}}">

                                @if ($errors->has('date_accomplish'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('date_accomplish') }}</strong>
                                    </span>
                                @endif
                                
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="status" class="col-md-4 control-label">Status</label>

                            <div class="col-md-6">
                                <select id="status" name="status" class="form-control">
                                    <option value="1" {{ $task->status === 1 ? 'selected="selected"' : '' }} >Pending</option>
                                    <option value="2" {{ $task->status === 2 ? 'selected="selected"' : '' }} >Completed</option>
                                </select>

                                @if ($errors->has('status'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('status') }}</strong>
                                    </span>
                                @endif
                                
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Update
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
