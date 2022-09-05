@extends('layouts.layoutTeam')

@section('content')
<div class="container">
<main>
        <center><h1>CREAR CLUB</h1><br></center>
        

</main>
<section class="form-register">
<form action="{{ route('team.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
                <div class="col-xl-6">
                <label>Nombre del Club:</label>
                    <br><br>
                        <input class="controls" type="text" name="Name" id="Name" placeholder="Ingrese el Nombre del Club *">
                        <br>    
                </div>
                <div class="col-xl-3">
                <label>Personeria Juridica:</label>
                    <br><br>
                        <input class="controls" type="text" name="Personeria" id="Personeria" placeholder="Ingrese la Personeria Juridica">
                        <br>    
                </div>
                <div class="col-xl-3">
                <label>Fecha de Creación:</label>
                    <br><br>
                        <input class="controls" type="date" name="Date" id="Date" placeholder="Ingrese Fecha de Creación">
                        <br>    
                </div>
                <div class="col-xl-6">
                <label>Ingrese Logo del Club:</label>
                    <br><br>
                        <input class="controls" type="file" name="LogoClub" id="LogoClub" >
                        <br>    
                </div>
                               
                <div class="col-xl-3">
                <label>Delegado:</label>
                    <br><br>
                        <input class="controls" type="text" name="Manager" id="Manager" placeholder="Ingrese Nombre del Delegado ">                 
                        <br>    
                </div>
                <div class="col-xl-3"> 
                <label>Categoria:</label>
                    <br><br>
                        <select class="controls"  name="Category" id="Category" placeholder="Seleccione">
                                
                                <option value="1ra de Honor">1ra de Honor</option>
                                <option value="1ra de Ascenso">1ra de Ascenso</option>
                                <option value="2da de Ascenso">2da de Ascenso</option>
                                <option value="Juvenil">Juvenil</option>
                                <option value="Menores">Menores</option>
                                <option value="Infantil">Infantil</option>
                                <option value="Minis">Minis</option>                                
                        </select>  
                        
                         <br> 
                </div>
                <div class="col-xl-6">
                <label>Telefono de Contacto:</label>
                    <br><br>
                        <input class="controls" type="text" name="Phone" id="Phone" placeholder="Ingrese el Telefono">                 
                        <br>    
                </div>
                <div class="col-xl-6"> 
                <label>Ingrese Entrenador:</label>
                    <br><br>
                        <select class="controls"  name="Coach" id="Coach" placeholder="Seleccione">
                                @foreach($entrenadors as $data)
                                <option value="{{$data->id}}">{{$data->id}} | {{$data->name}}</option>
                                @endforeach
                                                           
                        </select>  
                        
                         <br> 
                </div>
                
               
        </div>  
         <center>      
         <input class="botons" type="submit" value="Guardar Datos">
        </center>

        </form>
</section>
@endsection

@section('js')

    

@endsection