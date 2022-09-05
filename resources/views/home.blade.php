@extends('layouts.layoutHome')

@section('content')
<div class="container">
<main>
        <center><h1>ULTIMAS NOTICIAS DE LA ASOCIACION MUNICIPAL DE VOLEIBOL ORURO</h1><br></center>


</main>
<section class="form-register">
@if(Session::has('Mensaje')){{
    Session::get('Mensaje')
}}
@endif
<center><h4>Registrar Nueva Noticia</h4></center>

        <form action="{{ route('report.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">

                <div class="col-xl-6">
                <label>Ingrese Fotografia de la Noticia:</label>
                    <br><br>
                        <input class="controls" type="file" name="Foto" id="Foto" >
                        <br>
                </div>


                <div class="col-xl-6">
                <label>Descripción:</label>
                <br><br>
                        <input class="controls" type="text" name="Descripcion" id="Descripcion" placeholder="Ingrese la descripción de la noticia">
                        <br>
                </div>


                        <input class="botons" type="submit" value="Guardar Datos">

        </div>

        </form>
</section>
<br><br>
<!--@foreach($rec as $data)

<div class="galeria">

    <div class="contenedor-imagenes">
        <div class="imagen">
        <img src="{{asset('storage/report/'.$data->picture_new)  }}">
            <div class="overlay">
                <h2>{{$data->description}}</h2>
            </div>
        </div>

    </div>
</div>

<br>
@endforeach-->

@foreach($rec as $data)
<div class="container1">
    <div class="item">
    <img src="{{asset('storage/report/'.$data->picture_new)  }}" alt="{{asset('storage/report/'.$data->picture_new)  }}" width="100%">

      <div class="item-text">
        <h3>Descripción:</h3>
        <p>{{$data->description}}</p>
      </div>
    </div>
</div>
@endforeach
@endsection

@section('js')



@endsection
