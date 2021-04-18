@extends('layouts.main-layout')

@section('main_content')

    <h1>Creations:</h1>

    <ul>

        @foreach ($creations as $creation)

            <li>
                <div class="row creations  ">

                    <span class="creation col-4 d-flex justify-content-between">
                        
                      
                            
                            [{{$creation -> id }}] - {{ $creation -> processing_name }}
                      
                        
                    </span>
                    
                    <span>
                        
                        <a href="{{ route('delete-data', $creation -> id )}}"><i class="far fa-trash-alt ml-4"></i></a> 
                        
                    </span>
                    
                </div>

            </li>
            
        @endforeach

    </ul>

@endsection