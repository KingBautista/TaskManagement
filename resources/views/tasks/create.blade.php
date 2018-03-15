@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add Task</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{url('tasks')}}">
                        {{ csrf_field() }}

                        <input type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id }}">

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

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
                                <input type="date_accomplish" name="date_accomplish" class="form-control">

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
                                    <option value="1" selected="selected">Pending</option>
                                    <option value="2">Completed</option>
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
                                    Create
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
