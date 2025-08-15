@extends('layout.base')

@section('content')
<form class="row">
    <div class="col">
        <input class="form-control mb-3" id="task-name" name="task_name" placeholder="Insert task name" type="text" />
        <button class="btn btn-primary" type="submit">Add</button>
    </div>

    <div class="col">
        <table class="table" id="tasks">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th colspan="2" scope="col">Task</th>
                </tr>
            </thead>

            <tbody>
                @if (!empty($tasks))
                    @foreach ($tasks as $t)
                        <tr>
                            <td>{{ $t->id }}</td>
                            <td>{{ $t->name }}</td>
                            <td>
                                @if (!$t->complete)
                                    <div class="actions">
                                        <button class="bi bi-check" title="Complete task" type="submit"></button>
                                        <button class="bi bi-x" title="Remove task" type="submit"></button>
                                    </div>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td class="text-center" colspan="3">No tasks found.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</form>
@endsection
