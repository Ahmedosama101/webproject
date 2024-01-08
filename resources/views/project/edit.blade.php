@extends('layouts.app')
 
@section('body')
    <h1 class="mb-0">Edit {{ $project->name }} project information</h1>
    <hr />
    <form action="{{ route('project.update', $project->projectsid) }}" method="POST">

        @csrf
        @method('PUT')
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Name</label>
                <input type="text" name="name" class="form-control" placeholder="name" value="{{ $project->name }}" >
            </div>
            <div class="col mb-3">
                <label class="form-label">Owner</label>
                <input type="text" name="owner" class="form-control" placeholder="owner" value="{{ $project->owner }}" >
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
            <label for="planning">Project Type:</label>
                <div>
                    <select name="type" id="type" class="inputsize form-control">
                        <option value="" disabled selected>Select Project Type</option> 
                        <option value="New System">New System</option>
                        <option value="System Enhancment">System Enhancment</option>
                    </select>
                </div>
            </div>
            <div class="col mb-3">
            <label class="form-label">estimatedduration</label>
                <input type="text" name="estimatedduration" class="form-control" placeholder="estimatedduration" value="{{ $project->estimatedduration }}" >
            </div>
        </div>


        <div class="row">
            <div class="col mb-3">
                <?php
                    $developers = \App\Models\User::where('role', '3')->get();
                ?>
                <label for="leaddeveloper">Project Lead Developer:</label>
                    <select name="leaddeveloper" id="leaddeveloper" class="inputsize form-control" required>
                        <option value="" disabled>{{ optional($project->leadDeveloper)->name }}</option> 
                        @foreach ($developers as $developer)
                            <option value="{{ $developer->id }}">{{ $developer->name }}</option>
                        @endforeach
                    </select>
            </div>

            <div class="col mb-3">
            <?php
            $developers = \App\Models\User::where('role', '4')->get();
            ?>
            <label for="developer">Project Developers:</label>    
            <div class="mt-2">
                @foreach ($developers as $developer)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="developers[]" value="{{ $developer->id }}" id="developer_{{ $developer->id }}">
                        <label class="form-check-label" for="developer_{{ $developer->id }}">
                            {{ $developer->name }}
                        </label>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label for="startdate">Project Start Date:</label>
                <input type="date" name="startdate" id="startdate" class="inputsize form-control" value="{{ $project->startdate }}" required>
            </div>
            <div class="col mb-3">
                <label for="enddate">Project End Date:</label>
                <input type="date" name="enddate" id="enddate" class="inputsize form-control" value="{{ $project->enddate }}" required>
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
            <label class="form-label">Status</label>
             <div>
                <select class="inputsize form-control" name="status" id="status">
                        <option value="" disabled selected>Select Project Status</option> 
                        <option value="On Target" {{ $project->status == 'On Target' ? 'selected' : '' }}>On Target</option>
                        <option value="Ahead of Target" {{ $project->status == 'Ahead of Target' ? 'selected' : '' }}>Ahead of Target</option>
                        <option value="Off Target" {{ $project->status == 'Off Target' ? 'selected' : '' }}>Off Target</option>
                </select>
             </div>
            </div>
            <div class="col mb-3">
            <label class="form-label">Initiation</label>
                <div>
                    <select class="inputsize form-control" name="initiation" id="initiation">
                        <option value="" disabled selected>Select Project Status</option> 
                        <option value="On Target" {{ $project->initiation == 'On Target' ? 'selected' : '' }}>On Target</option>
                        <option value="Ahead of Target" {{ $project->initiation == 'Ahead of Target' ? 'selected' : '' }}>Ahead of Target</option>
                        <option value="Off Target" {{ $project->initiation == 'Off Target' ? 'selected' : '' }}>Off Target</option>
                    </select>
                </div>           
             </div>
        </div>
        <div class="row">
            <div class="col mb-3">
            <label class="form-label">Planning</label>
                <div>
                    <select class="inputsize form-control" name="planning" id="planning">
                        <option value="" disabled selected>Select Project Status</option> 
                        <option value="On Target" {{ $project->planning == 'On Target' ? 'selected' : '' }}>On Target</option>
                        <option value="Ahead of Target" {{ $project->planning == 'Ahead of Target' ? 'selected' : '' }}>Ahead of Target</option>
                        <option value="Off Target" {{ $project->planning == 'Off Target' ? 'selected' : '' }}>Off Target</option>
                    </select>
                </div>            
            </div>
            <div class="col mb-3">
            <label class="form-label">Design</label>
                <div>
                    <select class="inputsize form-control" name="design" id="design">
                        <option value="" disabled selected>Select Project Status</option> 
                        <option value="On Target" {{ $project->design == 'On Target' ? 'selected' : '' }}>On Target</option>
                        <option value="Ahead of Target" {{ $project->design == 'Ahead of Target' ? 'selected' : '' }}>Ahead of Target</option>
                        <option value="Off Target" {{ $project->design == 'Off Target' ? 'selected' : '' }}>Off Target</option>
                  </select>
                </div>
            </div>
        </div>
        <div class="row">
        <div class="col mb-3">
           <label class="form-label">Testing</label>
                <div>
                    <select class="inputsize form-control" name="testing" id="testing">
                        <option value="" disabled selected>Select Project Status</option> 
                        <option value="On Target" {{ $project->testing == 'On Target' ? 'selected' : '' }}>On Target</option>
                        <option value="Ahead of Target" {{ $project->testing == 'Ahead of Target' ? 'selected' : '' }}>Ahead of Target</option>
                        <option value="Off Target" {{ $project->testing == 'Off Target' ? 'selected' : '' }}>Off Target</option>
                  </select>
                </div>
           </div>
           <div class="col mb-3">
                <label class="form-label">Deploy</label>
                  <div>
                    <select class="inputsize form-control" name="deploy" id="deploy">
                        <option value="" disabled selected>Select Project Status</option> 
                        <option value="On Target" {{ $project->deploy == 'On Target' ? 'selected' : '' }}>On Target</option>
                        <option value="Ahead of Target" {{ $project->deploy == 'Ahead of Target' ? 'selected' : '' }}>Ahead of Target</option>
                        <option value="Off Target" {{ $project->deploy == 'Off Target' ? 'selected' : '' }}>Off Target</option>
                  </select>
                </div>
           </div>   
        </div>
        
        <div class="text-center">
            <button type="button" class="btn btn-primary">Update</button>
        </div>
    </form>
@endsection