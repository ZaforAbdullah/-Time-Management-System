@extends('layouts.app')

@section('content')
    <h3 class="page-title">Dashboard</h3>
    <div class="panel panel-default">
        <div class="panel-heading">
            List
        </div>

        <div class="panel-body">
            <table class="table table-bordered table-striped {{ count($time_entries) > 0 ? 'datatable' : '' }} dt-select">
                <thead>
                    <tr>
                        <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        <th>Task</th>
                        <th>Start time</th>
                        <th>End time</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($time_entries) > 0)
                        @foreach ($time_entries as $time_entry)
                            <tr data-entry-id="{{ $time_entry->id }}">
                                <td></td>
                                <td>{{ $time_entry->task_name or '' }}</td>
                                <td>{{ $time_entry->start_time }}</td>
                                <td>{{ $time_entry->end_time }}</td>
                                <td><a href="{{ route('dashboard.show',[$time_entry->id]) }}" class="btn btn-xs btn-primary">View</a><a href="{{ route('dashboard.edit',[$time_entry->id]) }}" class="btn btn-xs btn-info">Edit</a>{!! Form::open(array(
                'style' => 'display: inline-block;',
                'method' => 'DELETE',
                'onsubmit' => "return confirm('".trans("Are you sure?")."');",
                'route' => ['dashboard.destroy', $time_entry->id])) !!}
    {!! Form::submit('Delete', array('class' => 'btn btn-xs btn-danger')) !!}
    {!! Form::close() !!}</td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6">No entries in table</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript')
    <script>
        window.route_mass_crud_entries_destroy = '{{ route('dashboard.mass_destroy') }}';
    </script>
@endsection