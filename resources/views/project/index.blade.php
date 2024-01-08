@extends('layouts.app')
 
@section('body')
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">Project Management Dashboard</h1>
<!--        <a href="/projectpdf" class="btn btn-succsess">Export PDF</a>  -->
    </div>
    <table>
        <thead>
            <tr>
                <th>Project ID</th>
                <th>Name</th>
                <th>Owner</th>
                <th>Type</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Estimated Duration</th>
                <th>Status</th>
                <th>Lead Developer</th>
                <th>Developers</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($projects as $project)
                <tr>
                    <td>{{ $project['projectsid'] }}</td>
                    <td>{{ $project['name'] }}</td>
                    <td>{{ $project['owner'] }}</td>
                    <td>{{ $project['type'] }}</td>
                    <td>{{ $project['startdate'] }}</td>
                    <td>{{ $project['enddate'] }}</td>
                    <td>{{ $project['estimatedduration'] }}</td>
                    <td>{{ $project['status'] }}</td>
                    <td>
                        @if($project->leadDeveloper)
                            {{ optional($project->leadDeveloper)->name }}
                        @else
                            Lead Developer Not Found
                        @endif
                    </td>
                    <?php
                        $projectId = $project['projectsid'];
                        $developers = \App\Models\ProjectUser::where('projectid', $projectId)->get();
                     ?>
                   <td>  @foreach ($developers as $developer)
                   <?php
                        $user = \App\Models\SystemUser::find($developer->userid);
                    ?>
                        {{ $user->name }}
                    @endforeach
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
