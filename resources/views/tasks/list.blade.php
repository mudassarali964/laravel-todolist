@extends('todolist::tasks.app')
@section('content')
    @if(isset($task))
        <h3>Edit : </h3>
        <form action="{{ route('tasks.update', $task->id) }}" method="POST">
            @csrf
            @method('PUT')
    @else
        <h3>Add New Task : </h3>
        <form action="{{ route('tasks.store') }}" method="POST">
            @csrf
    @endif
                    <div class="form-inline">
                        <div class="form-group">
                            <input type="text" name="name" value="{{ (isset($task) && $task->name) ? $task->name : '' }}" required/>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary form-control">Submit</button>
                        </div>
                    </div>
                </form>
                <hr>
                <h4>Tasks To Do : </h4>
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tasks as $task)
                        <tr>
                            <td>{{ $task->name }}</td>
                            <td>
                                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                                    <div class='btn-group'>
                                        <a href="{!! route('tasks.edit', [$task->id]) !!}" class='btn btn-default btn-xs'>
                                            <i class="glyphicon glyphicon-edit"></i>
                                        </a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure?');">
                                            <i class="glyphicon glyphicon-trash"></i>
                                        </button>
                                    </div>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
@endsection
