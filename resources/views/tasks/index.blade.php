@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Task List</h1>
    <form method="GET" action="{{ route('tasks.index') }}">
        <input type="text" name="search" value="{{ request()->get('search') }}" placeholder="Search by title">
        <button type="submit">Search</button>
    </form>
    <a href="{{ route('tasks.create') }}" class="add-task-link">Add Task</a>
    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tasks as $task)
            <tr>
                <td>{{ $task->title }}</td>
                <td>{{ $task->description }}</td>
                <td>{{ $task->status }}</td>
                <td>
                    <a href="{{ route('tasks.edit', $task) }}">Edit</a>
                    <form action="{{ route('tasks.destroy', $task) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $tasks->links() }}
</div>
@endsection