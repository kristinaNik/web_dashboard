@extends('layouts/master')
@section('content')
    <div class="col-md-12">
        <form id="button_config">
            <p class="text-success" id="success_message"></p>
            <p class="text-danger" id="danger_message"></p>
            <div class="board___name">
                <h2 class="header_name"><span class="dashboard_name">SHKOLO</span></h2>
            </div>
            <div class="form-group">
                <label for="title">Title</label>
                <input type="title" name="title" class="form-control" id="title">
            </div>
            <div class="form-group">
                <label for="link">Link</label>
                <input type="link" name="link" class="form-control" id="link">
            </div>
            <div class="form-group">

                <label for="color">Color</label>
                <select class="form-control" id="color">

                    <option value="">Choose</option>

                </select>
            </div>
            <button type="submit" id="add_configurations"  class="btn btn-primary">Submit</button>
            <a href="{{route('dashboard')}}" class="btn btn-primary">Go to main dashboard</a>
        </form>
    </div>
<script src="{{asset('js/get_colors.js')}}"></script>
<script src="{{asset('js/add_config.js')}}"></script>

@endsection


