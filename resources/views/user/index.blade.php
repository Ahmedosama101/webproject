@extends('layouts.app')
 
@section('body')
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">User Management Dashboard</h1>
    </div>
    <table>
        <thead>
            <tr>
                <th>User ID</th>
                <th>Name</th>
                <th>Role</th>
                <th>Email</th>
                 <!--  <th>Password</th>  </td> -->
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user['id'] }}</td>
                    <td>{{ $user['name'] }}</td>
                    <td>{{ $user['role'] }}</td>
                    <td>{{ $user['email'] }}</td>
                 <!--   <td type="password">{{ $user['password'] }}</td> -->
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection