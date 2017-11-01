@extends('layouts.app')

@section('title', $task->name)

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">
            {{ $task->name }}
        </div>
        <div class="panel-body">
            <div>
                タスク名: {{ $task->name }}
            </div>
            <div>
                完了: {{ $task->done ? '完了' : '未' }}
            </div>
            <div>
                重要度: {{ $priorities->name($task->primary_level)}}
            </div>
            <div>
                {{ link_to_route('tasks.edit', '編集', $task->id, ['class' => 'btn btn-sm btn-default']) }}
            </div>
        </div>
        <div class="panel-footer">
            {{ link_to_route('tasks.index', '戻る') }}
        </div>
    </div>

@endsection
