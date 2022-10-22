@extends('layouts.app')
    @section('content')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css">
    <div class="container">
        <h3 style="text-align:center">Todo List</h3>
        <form action="{{url('/store')}}" method="post">
            @csrf
        <div class="row">
            <div class="col-md-12 mt-4">
            <input type="text" class="form-control" name="Title" placeholder="Add an Todo">
            </div>
            <div class="col-md-6 mt-4">
            <label for="StartDate">Start Of Date</label><br>
            <input type="date" id="startdate" name="Startofdate" style="width:100%">
            </div>
            <div class="col-md-6 mt-4">
            <label for="EndDate">End  Of Date</label><br>
            <input type="date" id="enddate" name="Endofdate" style="width:100%">
            </div>
            <div class="col-md-12 mt-4">
            <label for="Status">Status</label>
            <select name="Status" id="status">
                <option value="active">Active</option>
                <option value="deactive">Deactive</option>
                <option value="done">Done</option>
                <option value="expired">Expired</option>
            </select>
            </div>
            <div class="col-md-12 mt-4" style="text-align: center">
            <button class="btn btn-primary" type="submit" name="add" value="Add item"  >
                Add Todo
            </button>
            </div>
        </div>
        </form>
        <hr>
    </div>
</div>
<div class="container mb-4 p-4">
    <table id="todotable" class="table table-striped table-bordered list-order-table" style="width:100%">
        <thead>
        <tr>
            <th>S.No</th>
            <th>Title</th>
            <th>Start Of Date</th>
            <th>End Of Date</th>
            <th>Status</th>
            <th>Action</th>

        </tr>
        </thead>
        <tbody>
            @foreach ($todo as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item['Title']}}</td>
                <td>{{$item['Startofdate']}}</td>
                <td>{{$item['Endofdate']}}</td>
                <td>{{$item['Status']}}</td>
                <td style="display: flex">
                    <a href="{{"/edit/".$item['id']}}">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#0d6efd"><path d="M0 0h24v24H0z" fill="none"/><path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.39-.39-1.02-.39-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z"/></svg>
                    </a>
                    <form action="{{ route('deletelist', $item->id) }}" method="POST">
                        @csrf
                        <a href="" type="submit" class="show_confirm"
                            data-toggle="tooltip"> <svg xmlns="http://www.w3.org/2000/svg"
                                height="24px" viewBox="0 0 24 24" width="24px" fill="#dc3545">
                                <path d="M0 0h24v24H0z" fill="none" />
                                <path
                                    d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM19 4h-3.5l-1-1h-5l-1 1H5v2h14V4z" />
                            </svg>
                        </a>
                    </form>
                </td>

            </tr>
            @endforeach
        </tbody>

    </table>
</div>


@endsection



