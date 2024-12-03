@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Task</h1>
    <form method="POST" action="{{ route('tasks.update', $task) }}">
        @csrf
        @method('PUT')
        <div>
            <label for="title">Title</label>
            <input type="text" name="title" id="title" value="{{ $task->title }}" required>
        </div>
        <div>
            <label for="description">Description</label>
            <textarea name="description" id="description" required>{{ $task->description }}</textarea>
        </div>
        <div>
            <label for="status">Status</label>
            <select name="status" id="status" required>
                <option value="pending" {{ $task->status == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="completed" {{ $task->status == 'completed' ? 'selected' : '' }}>Completed</option>
            </select>
        </div>
        <button type="submit">Update Task</button>
    </form>
</div>
@endsection