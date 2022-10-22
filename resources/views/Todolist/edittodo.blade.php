@extends('layouts.app')
     @section('content')
    <div class="container mt-3">
        <h2>Edit Todo List</h2>
        <form action="{{route('updatelist',$todo->id)}}" method="post">
            @csrf
            <div class="form-group">
                <input type="text" class="form-control" name="Title" placeholder="Add an Todo" value="{{$todo->Title}}">
            </div>
            <div class="form-group">
            <label for="StartDate">Start Of Date</label>
            <input type="date" id="startdate" name="Startofdate" value="{{$todo->Startofdate}}"><br>
            <label for="EndDate">End  Of Date</label>
            <input type="date" id="enddate" name="Endofdate" value="{{$todo->Endofdate}}">
            <label for="Status">Status</label>
            <select name="Status" id="status">
                <option value="active" @if($todo->Status == 'active') selected @endif>Active</option>
                <option value="deactive" @if($todo->Status == 'deactive') selected @endif>Deactive</option>
                <option value="done" @if($todo->Status == 'deactive') selected @endif>Done</option>
            </select>

            </div>
            <button class="btn btn-primary" type="submit" name="add" value="Add item" style="margin-left: 150px;">
                Update
            </button>
        </form>
    </div>
@endsection
