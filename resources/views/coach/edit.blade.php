@extends('layouts.layoutCoach')

@section('content')
<div class="container">
<main>
        <center><h1>ACTUALIZAR ENTRENADOR</h1><br></center>
        

</main>
<section class="form-register">
<form action="{{ route('coach.update', $coach->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
                <div class="col-xl-6">
                        <input class="controls" type="text" value= "{{$coach->name}}" name="Name" id="Name" placeholder="Ingrese la Nombre *">
                        <br>    
                </div>
                <div class="col-xl-3">
                        <input class="controls" type="text" value= "{{$coach->ci}}" name="CI" id="CI" placeholder="Ingrese el carnet de Identidad">
                        <br>    
                </div>
                <div class="col-xl-3">
                        <input class="controls" type="text" value= "{{$coach->phone}}" name="Phone" id="Phone" placeholder="Ingrese el telefono">
                        <br>    
                </div>
                <div class="col-xl-6">
                        <input class="controls" type="file" name="Photography" id="Photography" placeholder="Ingrese la Nombre *">
                        <br>    
                </div>
                <div class="col-xl-3">
                        <input class="controls" type="number" value= "{{$coach->age}}" name="Age" id="Age" placeholder="Ingrese la Edad ">                 <br>    
                </div>
                <div class="col-xl-3"> 
                        <select class="controls"  name="Category" id="Category" placeholder="Seleccione">
                                
                                <option value="Libre">Libre</option>
                                <option value="Nacional I">Nacional I</option>
                                <option value="FIVB I">FIVB I</option>
                                <option value="FIVB II">FIVB II</option>
                                <option value="FIV III">FIVB III</option>
                                
                        </select>  
                        
                         <br> 
                </div>
               
                
               
        </div>  
         <center>      
         <input class="botons" type="submit" value="Actualizar Datos">
        </center>

        </form>
</section>
@endsection

@section('js')

    

@endsection
