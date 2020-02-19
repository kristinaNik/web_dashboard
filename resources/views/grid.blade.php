@extends('layouts/master')
@section('title')
    Laravel web dashboard
@endsection
@section('content')

    <div class="board__main hide-container">
        <div class="board___name">
            <h2 class="header_name"><span class="dashboard_name">SHKOLO</span></h2>
        </div>
        <div class="col-md-12">
            @foreach($buttonConfigurations as $buttonConfiguration)
                <div class="board__cell">
                    <div class="add_link">
                        <button class="button_link" data-id="{{$buttonConfiguration->id}}" style="background-color: {{$buttonConfiguration->colors->color}}">
                              <a href="{{ $buttonConfiguration->link }}" title="{{$buttonConfiguration->title}}">+</a>

                        </button>
                        <div>
                            <a  class="config_links" href="{{route('edit-configuration', $buttonConfiguration->id)}}" >Edit</a>
                            <a  class="config_links"  href="{{route('delete-configuration', $buttonConfiguration->id)}}">Delete</a>
                        </div>

                    </div>

                </div>
                @endforeach
               @for($i = 0; $i<9 - count($buttonConfigurations) ; $i++)
                <div class="board__cell">
                    <div class="add_link">
                        <button class="button_link" data-id="{{$i}}" >
                            <a href="{{route('add-configuration')}}">+</a>
                        </button>
                        <div>

                        </div>
                    </div>
                </div>
               @endfor
        </div>
    </div>
@endsection



