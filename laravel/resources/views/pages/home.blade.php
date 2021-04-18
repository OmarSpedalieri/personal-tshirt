@extends('layouts.main-layout')

    @section('main_content')

    <div class="main row p-2">

            <div class="left col-6 d-flex flex-column justify-content-between border-right border-info">

                <div class="row d-flex justify-content-around">

                    @foreach ($tshirts as $tshirt)  
                    
                         <div class="cold-flex flex-column text-center">
                            <div id="templates">  
                               <img  class="element border-bottom border-info" src="{{ $tshirt -> url }}" alt=""> 
                            </div>  
                            <div class="desc">
                                <p>{{ $tshirt -> name}}</p>
                            </div>  
                        </div>    
                    @endforeach
                </div> 

            </div>   
           
    
             
            <div class="right col-4 offset-1 p-0 ">

                <div id="img-container">
                    
                    <img id="image_BG" src="storage/tshirt/man_short.png"/>

                    <div id="drawingArea" class="drawing-area">					

                           <canvas id="canvas"></canvas>
                       
                    </div> 
                </div>

            </div>
            
            
    </div>
            
    <div class="cmd row my-5">


        <div class="col-4 offset-8 d-flex justify-content-center my-4">

            <label class="mx-2" for="tshirt-design">PICK YOUR STYLE</label>
            <select id="tshirt-design">
                <option value="">Select graphic...</option>
                <option value="storage/graphics/puma.png">Puma</option>
                <option value="storage/graphics/nike.png">Nike</option>
                <option value="storage/graphics/adidas.png">Adidas</option>
                <option value="storage/graphics/lacoste.png">Lacoste</option>
                <option value="storage/graphics/diadora.png">Diadora</option>
                <option value="storage/graphics/graffiti.png">Graffiti</option>
            </select>

        </div>

        <div class="col-6 d-flex justify-content-center">
                                        
            <label class="mx-2" for="title">Give a name to your project:</label>
            <input class="mx-2" id="title" type="text" placeholder="Project name">
            <button class="mx-2 btn btn-outline-info" type="submit" id="save_btn" >Salva</button>  
 
        </div>

        <div class="col-4 offset-2 d-flex justify-content-center">
            <label class="mx-2" for="delete">Press CANC or click here:</label>
            <button class="mx-2 btn btn-outline-info" id="delete"> DELETE </button> 

        </div>

    </div>

 @endsection