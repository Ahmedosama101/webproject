@extends('layouts.app')
 
 @section('body')
<div class="dashboard">
    <h1>Add New Project</h1>

    <!-- Form to Add New Project -->
    <form action="{{route('project.store')}}" method="POST">
        @csrf
        <div class="row">
            <div class="col mb-3">
                <label for="name">Project Name:</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="col mb-3">
                <label for="owner">Project Owner:</label>
                <input type="text" name="owner" id="owner" class="form-control" required>
            </div>
            <div class="col mb-3">
            <label for="planning">Project Type:</label>
                <div class="custom-dropdown">
                    <select name="type" id="type" class="inputsize form-control" required>
                        <option value="" disabled selected>Select Project Type</option> 
                        <option value="New System">New System</option>
                        <option value="System Enhancment">System Enhancment</option>
                    </select>
                </div>
            </div>
        </div>            
        <div class="row">
            <div class="col mb-3">
                <label for="startdate">Project Start Date:</label>
                <input type="date" name="startdate" id="startdate" class="inputsize form-control" required>
            </div>
            <div class="col mb-3">
                <label for="enddate">Project End Date:</label>
                <input type="date" name="enddate" id="enddate" class="inputsize form-control" required>
            </div>
            <div class="col mb-3">
                <label for="estimatedduration">Project Estimated Duration:</label>
                <input type="text" name="estimatedduration" id="estimatedduration" class="form-control" required>
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
            <?php
                $developers = \App\Models\User::where('role', '3')->get();
            ?>
            <label for="leaddeveloper">Project Lead Developer:</label>
            <div class="custom-dropdown">
                <select name="leaddeveloper" id="leaddeveloper" class="inputsize form-control" required>
                    <option value="" disabled selected>Select Project Lead Developer</option> 
                    @foreach ($developers as $developer)
                        <option value="{{ $developer->id }}">{{ $developer->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        </div>
        
        <div class="col mb-3">
            <?php
            $developers = \App\Models\User::where('role', '4')->get();
            ?>
            <label for="developer">Project Developers:</label>    
            <div class="mt-2" required>
                @foreach ($developers as $developer)
                    <div class="form-check" >
                        <input class="form-check-input" type="checkbox" name="developers[]" value="{{ $developer->id }}" id="developer_{{ $developer->id }}">
                        <label class="form-check-label" for="developer_{{ $developer->id }}">
                            {{ $developer->name }}
                        </label>
                    </div>
                @endforeach
            </div>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Add Project</button>
    </form>
</div>
@endsection