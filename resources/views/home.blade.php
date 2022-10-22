@extends('layouts.app')

@section('content')
<style>
    .active,.pending,.expire,.done{
       
        border-radius: 10px;
        padding:30px;
    }
    
</style>
    <div class="container">
        <div class="row justify-content-center">
            <div class="row" style="text-align: center">
                <div class="col-md-3">
                    <div class=" card active">
                        <h5 class="card-title mt-4">Total Active Tasks</h5>
                        <h6 class="card-subtitle mb-2 ">{{ count($todoactive) }}</h6>

                    </div>
                </div>
                <div class="col-md-3">

                    <div class="card pending">
                        <h5 class="card-title mt-4"> Total Pending Tasks</h5>
                        <h6 class="card-subtitle mb-2 ">{{ count($todopending) }}</h6>

                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card expire">
                        <h5 class="card-title mt-4"> Total Expired Task</h5>
                        <h6 class="card-subtitle mb-2 ">{{ count($todoexpired) }}</h6>

                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card done">
                        <h5 class="card-title mt-4"> Total Done Tasks</h5>
                        <h6 class="card-subtitle mb-2 ">{{ count($tododone) }}</h6>

                    </div>
                </div>
            </div>
            {{-- <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h3>Active Tasks</h3>
                            <p class="mb-0">Total Active Tasks</p>
                        </div>
                        <h1>{{ count($todoactive) }}</h1>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h3>Pending Tasks</h3>
                            <p class="mb-0">Total Pending Tasks</p>
                        </div>
                        <h1>{{ count($todopending) }}</h1>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mt-30-md">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h3>Expired Tasks</h3>
                            <p class="mb-0">Total Expired Task</p>
                        </div>
                        <h1>{{ count($todoexpired) }}</h1>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mt-30-md">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h3>Done Tasks</h3>
                            <p class="mb-0">Total Done Tasks</p>
                        </div>
                        <h1>{{ count($tododone) }}</h1>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
@endsection
