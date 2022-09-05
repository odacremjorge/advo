<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carnet de Jugador</title>
     <!-- Scripts -->
     <script src="{{ asset('js/card.js') }}" defer></script>

    <link href="{{ asset('css/card.css') }}" rel="stylesheet">
</head>
<body>
    <br><br>
<a class= "buttonA" href="{{ url('/player') }}">
        Volver Atras
</a>
<center><h2> CARNET DE JUGADOR </h2></center>
    <div class="container">

        <section class="card" id="card">

            <div class="front">
            <center><p class="full">ASOCIACION DEPARTAMENTAL DE VOLEIBOL ORURO</p></center>
            <center><p class="full1">Club {{$play->name_team}} ({{$play->category_player}})</p></center>
               <br>
                
                <img src="{{asset('storage/player_pic/'.$play->picture_player)  }}" width="100" class="chip">
               
                

                <div class="data">

                    <div class="group" id="number">
                        <p class="label">Numero de Registro</p>
                        <p class="number">#### #### #### ####</p>
                    </div>    

                    <div class="flex">

                        <div class="group" id="name">
                            <p class="label">Nombre y Apellidos</p>
                            <p class="fullname">{{$play->name_player}}</p>
                        </div>
                        
                        <div class="group" id="expiration">
                            <p class="label">Expiracion</p>
                            <p class="expiration"><span class="month">MM</span> / <span class="year">AA</span> </p>
                        </div>

                    </div>

                </div>

            </div>

            <div class="back">

                <div class="magnetic-bar"></div>
                <div class="data">
                    <div class="group" id="signature">
                        <p class="label">Firma</p>
                        <div class="signature"><p></p></div>
                    </div>
                    <div class="group" id="ccv">
                        <P class="label">KARDEX</P>
                        <P class="ccv"></P>
                    </div>
                </div>
                <P class="label">NACIONALIDAD: {{$play->nacionality}}</P>
                <P class="label">FECHA DE NACIMIENTO: {{$play->date_birth}}</P>
                <P class="label">CEDULA DE IDENTIDAD: {{$play->ci_player}}</P>
                <P class="label">FECHA DE HABILITACIÓN: {{$play->date_hab}}</P>
                <div class="legend"><p>Esta tarjeta es personal e intrasnferible, en caso de extravio comuniquese de inmediato con la comisión tecnica.</p></div>
                <!--<center><a href="#" class="bank">www.advo.com</a></center>-->
            </div>

        </section>

        <div class="btn-container">

            <button class="btn-open" id="btn-open">
                <img src="{{asset('images/btn.png')}}">
                
            </button>

        </div>

        <form action="#" class="card-form" id="card-form">
            <div class="group">
                <label for="inputNumber">Numero Registro</label>
                <input type="text" id="inputNumber" maxlength="19" autocomplete="off">
            </div>
            
            <div class="group">
                <label for="inputName">Nombre Completo</label>
                <input type="text"  id="inputName" maxlength="30" autocomplete="off">
            </div>

            <div class="flex">

                <div class="group expire">

                    <label for="selectMonth">Expiracion</label>
                    <div class="flex">

                        <div class="group-select">
                            <select name="month" id="selectMonth">
                                <option disabled selected>Mes</option>
                            </select>
                        </div>
                        
                        <div class="group-select">
                            <select name="year" id="selectYear">
                                <option disabled selected>Año</option>
                            </select>
                        </div>

                    </div>

                </div>

                <div class="grupo cvv">
                    <label for="inputCvv">Kardex</label>
                    <input type="text"  id="inputCvv" maxlength="10">
                </div>

            </div>

            <button type="submit" class="btn-send">Guardar</button>
        </form>


    </div>
    

</body>
</html>