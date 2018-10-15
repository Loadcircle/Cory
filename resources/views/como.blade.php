@extends('layouts.views')
@section('content')
<div id="como">
    <div class="menu">
        <div class="container border_white">
            <div class="cory_35">
                <img class="img-fluid" src="{{ asset('Cory/logo.png') }}" alt="logo">
                <p><span>35 años</span></p>
            </div>
            <div class="row nav">
                <div class="col-md-4 col-sm-12">
                    <div class="cont_btns">
                        <a href="{{ route('index') }}" class="btn-blue">inscríbete</a>
                        {{--  <a href="#" class="link-blue">Cómo participar</a>  --}}
                    </div>
                </div>
                <div class="col-md-4  col-sm-12">
                    <div class="titulo_fiesta">
                        <p>ESTAMOS</p>
                        <div>
                            <div>
                                <p>D</p>
                                <p>E</p>
                            </div>
                            <p>FIESTA</p>
                        </div>
                        <p>y<span>tú</span>estás</p>
                        <p><span>invitado</span></p>
                    </div>
                </div>
                <div class="col-md-4  col-sm-12">
                    <div class="cont_btns">
                        <a href="#" class="link-blue" data-toggle="modal" data-target="#bases">Bases</a>
                        <div class="redes">
                            <a href="#"><img src="{{ asset('Cory/FACEBOOK2.png') }}" alt=""></a>
                            <a href="#"><img src="{{ asset('Cory/insta.png') }}" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row how_to">
                <div class="col-md-4  col-sm-12 text-center">
                    <img class="img-fluid" src="{{ asset('Cory/Flotantes/como1.png') }}" alt="">
                    <p class="color-blue"><span>Disfruta</span> en tu Coffe<br>House más cercano</p>
                </div>
                <div class="col-md-4  col-sm-12 text-center">
                    <img class="img-fluid" src="{{ asset('Cory/Flotantes/como2.png') }}" alt="">
                    <p class="color-blue">Entra a nuestra<br><span>Landing Page</span></p>
                </div>
                <div class="col-md-4  col-sm-12 text-center">
                    <img class="img-fluid" src="{{ asset('Cory/Flotantes/como3.png') }}" alt="">
                    <p class="color-blue"><span>Ingresa</span> tu número<br>de boleta</p>
                </div>
            </div>
        </div>
    </div>

    <div class="cake">
        <img class="img-fluid" src="{{ asset('Cory/BANDERIN1.png') }}" alt="">
        <img class="img-fluid" src="{{ asset('Cory/TORTA.png') }}" alt="">
        <img class="img-fluid" src="{{ asset('Cory/BANDERIN2.png') }}" alt="">
    </div>

    <div class="cumple_35">
        <img class="img-fluid" src="{{ asset('Cory/separadores.png') }}" alt="">
        <div>
            <h3>¡Cory cumple <span> 35 años!</span></h3>
            <p>Celébralos con nosotros</p>
            <p>¡Mientras más consumas, más</p>
            <p>oportunidades de ganar!</p>
        </div>
    </div>

    <div class="container sello my-5">
        <div class="row">
            <div class="col-md-6 col-12">
                <div class="border_white_2"></div>
            </div>
            <div class="col-md-6 col-12">
                <p>Participa por<br>un viaje a<br><span>Río de Janeiro<br>TODO INCLUIDO</span></p>
                <a href="{{ route('index') }}">Ingresa <span>&nbsp; tu boleta</span></a>
            </div>
        </div>
    </div>

    <footer>
        <p>Copyright Cory Coffe House</p>
    </footer>
</div>

@include('bases')
@endsection
