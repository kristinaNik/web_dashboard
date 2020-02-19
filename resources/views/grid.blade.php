@extends('layouts/master')
@section('title')
    Laravel web dashboard
@endsection
@section('content')

    <div class="board__main hide-container">
        <div class="board___name">
            <h2>Shokolo</h2>
        </div>
        <div class="board__container">
            @foreach($buttonConfigurations as $buttonConfiguration)
                <div class="board__cell">
                    <div class="add_link">
                        <button class="button_link" data-id="{{$buttonConfiguration->id}}" style="background-color: {{$buttonConfiguration->colors->color}}">
                              <a href="{{ $buttonConfiguration->link }}" title="{{$buttonConfiguration->title}}">+</a>

                        </button>
                        <a  id="edit_link" href="{{route('edit-configuration', $buttonConfiguration->id)}}" style="font-size: 12px">Edit</a>
                        <a  id="delete_link"  href="{{route('delete-configuration', $buttonConfiguration->id)}}" style="font-size: 12px">Delete</a>
                    </div>

                </div>
                @endforeach
               @for($i = 0; $i<9 - count($buttonConfigurations) ; $i++)
                <div class="board__cell">
                    <div class="add_link">
                        <button class="button_link" data-id="{{$i}}" >
                            <a href="{{route('add-configuration')}}">+</a>
                        </button>
                    </div>
                </div>
               @endfor
        </div>
    </div>
    <script src="{{asset('js/build_grid.js')}}"></script>
@endsection



