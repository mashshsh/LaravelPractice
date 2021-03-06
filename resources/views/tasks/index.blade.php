@extends('layouts.app')

@section('title', 'タスク一覧')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">
            タスク一覧
        </div>
        <div class="panel-body">
            <table class="table table-striped task-table">
                <thead>
                    <th>タスク名</th>
                    <th>優先度</th>
                    <th>状況</th>
                    <th>編集</th>
                    <th>削除</th>
                </thead>
                <tbody>
                    @foreach ($tasks as $tasks)
                        <tr>
                            <td class="table-text">
                                {{ link_to_route('tasks.show', $tasks->name, $tasks->id) }}
                            </td>
                            <td class="table-text">
                                {{ $tasks->priority->name }}
                            </td>
                            <td class="table-text">
                                {{ $tasks->done ? '完了' : '未' }}
                            </td>
                            <td class="table-text">
                                {{ link_to_route('tasks.edit', '編集', $tasks->id, ['class' => 'btn btn-sm btn-default']) }}
                            </td>
                            <td class="table-text">
                                {{ Form::open(['route' => ['tasks.destroy', $tasks->id], 'method' => 'delete']) }}
                                    {{ Form::hidden('id', $tasks->id) }}
                                    {{ Form::submit('削除', ['class' => 'btn btn-sm btn-default']) }}
                                {{ Form::close() }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <table class="table table-striped task-table">
                <tbody>
                    <tr>
                      <td>
                        <a class="navbar-brand" href="{!! action('TasksController@sendMail') !!}">
                            送信
                        </a>
                      </td>
                    <tr>
                </tbody>
            </table>
        </div>
    </div>

@endsection
