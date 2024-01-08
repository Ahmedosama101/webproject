<!-- resources/views/project/projectpdf.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Project Report - {{ $project->name }}</title>
    <style>
        /* Add any necessary styling for your PDF content */
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Project Report - {{ $project->name }}</h1>
    
    <h2>Project Details:</h2>
    <table>
        <thead>
            <tr>
                <th>Project ID</th>
                <th>Name</th>
                <th>Status</th>
                <th>Owner</th>
                <th>Type</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Estimated Duration</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $project->projectsid }}</td>
                <td>{{ $project->name }}</td>
                <td>{{ $project->status }}</td>
                <td>{{ $project->owner }}</td>
                <td>{{ $project->type }}</td>
                <td>{{ $project->startdate }}</td>
                <td>{{ $project->enddate }}</td>
                <td>{{ $project->estimatedduration }}</td>
            </tr>
        </tbody>
    </table>

    <h2>Progress Reports:</h2>
    <table>
        <thead>
            <tr>
                <th>Progress Date</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($progressReports as $report)
                <tr>
                    <td>{{ $report->progress_date }}</td>
                    <td>{{ $report->description }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
