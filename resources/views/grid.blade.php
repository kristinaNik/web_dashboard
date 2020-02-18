@extends('layouts/master')
@section('title')
    Laravel web dashboard
@endsection
@section('content')

    <div class="board__main hide-container">
        <div class="board___turn"></div>

        <div class="board__container">
            @for($i = 0; $i<9; $i++)
                <div class="board__cell">
                     <div class="add_link" data-id="{{$i}}"><button class="button_link"><span class="plus_sign">+ </span></button></div>
                 </div>
            @endfor
        </div>
    </div>


    <script src="{{asset('js/configuration.js')}}"></script>
@endsection



