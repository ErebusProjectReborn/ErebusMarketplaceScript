@extends('layouts.app')

<link rel="stylesheet" href="{{ asset('css/erebus/views/admin/logs/show.css') }}">
@section('content')



<div class="logs-show-container">
    <div class="logs-show-header">
        <h1 class="logs-show-title">
            @if($type === 'error')
                Error Logs
            @elseif($type === 'warning')
                Warning Logs
            @else
                Information Logs
            @endif
        </h1>
        <a href="{{ route('admin.logs.index') }}" class="logs-show-back-btn">Back to Logs</a>
    </div>

    <div class="logs-show-card">
        @if(count($logs) > 0)
            <div class="logs-show-entries">
                @foreach($logs as $log)
                    <div class="logs-show-entry logs-show-entry-{{ $type }}">
                        {!! $log !!}
                    </div>
                @endforeach
            </div>

            @if(method_exists($logs, 'hasPages') && $logs->hasPages())
                <div class="logs-show-pagination">
                    {{ $logs->links() }}
                </div>
            @endif
        @else
            <div class="logs-show-empty">
                <p>No logs found for this category.</p>
            </div>
        @endif
    </div>
</div>

@endsection
