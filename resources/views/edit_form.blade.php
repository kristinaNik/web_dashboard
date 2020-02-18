@extends('layouts/master')
@section('content')
<form id="button_config">
    <p class="text-success" id="success_message"></p>
    <h2>Shkolo</h2>
    <div class="form-group">
        <label for="title">Title</label>
        <input type="title" name="title" class="form-control" id="title" value="{{$buttonConfigurations->title}}">
    </div>
    <div class="form-group">
        <label for="link">Link</label>
        <input type="link" name="link" class="form-control" id="link" value="{{$buttonConfigurations->link}}">
    </div>
    <div class="form-group">

        <label for="color">Color</label>
        <select class="form-control" id="color">
            <option value="{{$colorId}}" selected="selected">{{$colorName}}</option>

            @foreach ($allColors as  $key => $color)

                <option value="{{$key}}"> {{ $color }}</option>
            @endforeach

        </select>
    </div>
    <button type="submit" id="edit_configurations"  class="btn btn-primary">Submit</button>
</form>

{{--<script src="{{asset('js/get_colors.js')}}"></script>--}}
<script src="{{asset('js/edit_config.js')}}"></script>
@endsection


