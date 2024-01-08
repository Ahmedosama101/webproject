@extends('layouts.app')
 
@section('body')
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">Projects Reports</h1>
    </div>
    <table>
        <thead>
            <tr>
                <th>Project ID</th>
                <th>Name</th>
                <th>Owner</th>
                <th>Type</th>
                <th>Status</th>
                <th>Report</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($projects as $project)
                <tr>
                    <td>{{ $project['projectsid'] }}</td>
                    <td>{{ $project['name'] }}</td>
                    <td>{{ $project['owner'] }}</td>
                    <td>{{ $project['type'] }}</td>
                    <td>{{ $project['status'] }}</td>
                    <td><a href="{{route('project.progress_report',$project->projectsid)}}" class="btn btn-success">Project Report</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection