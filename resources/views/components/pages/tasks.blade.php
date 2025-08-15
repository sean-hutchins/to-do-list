@extends('layout.base')

@section('content')
<x-shared.messages />

<div class="row">
    <div class="col-4">
        <form method="POST" action="{{ route('task.store') }}">
            @csrf
            @method('PUT')

            <input class="form-control mb-3" id="task-name" name="name" placeholder="Insert task name" type="text" />
            <button class="btn btn-primary btn-block col-12" type="submit">Add</button>
        </form>
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
                            <td class="col-1">{{ $t->id }}</td>
                            <td @class(['complete' => $t->complete])>{{ $t->name }}</td>
                            <td class="col-2">
                                <div class="actions">
                                    @if (!$t->complete)
                                        <form method="POST" action="{{ route('task.update', $t) }}">
                                            @csrf
                                            @method('PATCH')

                                            <button class="bi bi-check" name="complete" title="Complete task" type="submit" value="1"></button>
                                        </form>
                                    @endif

                                    <form method="POST" action="{{ route('task.destroy', $t) }}">
                                        @csrf
                                        @method('DELETE')

                                        <button class="bi bi-trash" title="Remove task" type="submit"></button>
                                    </form>
                                </div>
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
</div>
@endsection
