@extends('layouts.views')
@section('content')
<div id="landing">
    <div class="menu">
        <div class="row fondos">
            <div class="col-md-6 col-sm-12 bg-1"></div>
            <div class="col-md-6 col-sm-12 bg-2"></div>
        </div>
        <div class="container border_white">
            <div class="cory_35">
                <img class="img-fluid" src="{{ asset('Cory/logo.png') }}" alt="logo">
                <p><span>35 años</span></p>
            </div>
            <div class="row nav">
                <div class="col-md-4 col-sm-12">
                    <div class="cont_btns">
                        <div class="redes">
                            <a href="#"><img src="{{ asset('Cory/FACEBOOK.png') }}" alt=""></a>
                            <a href="#"><img src="{{ asset('Cory/instagram.png') }}" alt=""></a>
                        </div>
                        <a href="{{ route('participa') }}" class="">Cómo participar</a>
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
                        <a href="#" class="" data-toggle="modal" data-target="#bases">Bases</a>
                    </div>
                </div>
            </div>
            <div class="row how_to">
                <div class="col-md-6  col-sm-12 text-center">
                    <p>Participa por un viaje por 7<br>días para dos personas a</p>
                    <h4><span>Río de Janeiro, TODO INCLUIDO.</span></h4>
                </div>
                <div class="col-md-6  col-sm-12 text-center">
                    <button class="btn-pink" data-toggle="modal" data-target="#formulario">Ingresa <span>&nbsp;tu boleta</span></button>
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

    <div class="container pink-floats my-5">
       <img class="pie" src="{{ asset('Cory/Flotantes/torta.png') }}" alt="">
       <img class="sello" src="{{ asset('Cory/Sello/sello.png') }}" alt="">
       <img class="coffe" src="{{ asset('Cory/Flotantes/como1.png') }}" alt="">
        <div class="row">
            <div class="col-md-6 col-12">
                <div>
                    <p>Buscamos a nuestros<br><span>más fieles seguidores</span></p>

                    <p>Ingresa tu número de boleta y participa
                        por un viaje para dos personas durante 7
                    días a Río de Janeiro <span>TODO INCLUIDO</span></p>
                </div>
            </div>
            <div class="col-md-6 col-12">
                <button class="btn-blue" data-toggle="modal" data-target="#formulario">Ingresa <span>&nbsp;tu boleta</span></button>
            </div>
        </div>
    </div>

    <div class="cumple_35 my-5">
        <img class="img-fluid" src="{{ asset('Cory/separadores.png') }}" alt="">
        <div>
            <h3>Queremos<span>&nbsp;premiarte</span></h3>
        </div>
    </div>

    <div class="cartas">
        <div class="row container">
            <div class="col-md-3 col-sm-6 padding-0">
                <div class="hover-box">
                    <img class="img-fluid" src="{{ asset('Cory/premios/hand.jpg') }}" alt="">
                    <div class="second-v">
                        <p>Texto del hover</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 padding-0">
                <div class="hover-box">
                    <img class="img-fluid" src="{{ asset('Cory/premios/two.jpg') }}" alt="">
                    <div class="second-v">
                        <p>Texto del hover</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 padding-0">
                <div class="hover-box">
                    <img class="img-fluid" src="{{ asset('Cory/premios/gid.jpg') }}" alt="">
                    <div class="second-v">
                        <p>Texto del hover</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 padding-0">
                <div class="hover-box">
                    <img class="img-fluid" src="{{ asset('Cory/premios/torta.jpg') }}" alt="">
                    <div class="second-v">
                        <p>Texto del hover</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="aliados mt-5">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <p class="blue-ali">Nuestros<span>&nbsp;aliados</span></p>
            </div>
            <div class="col-md-6 col-sm-12">
                <img src="{{ asset('Cory/miyas.png') }}" alt="">
            </div>
        </div>
    </div>
    <footer>
        <p>Copyright Cory Coffe House</p>
    </footer>
</div>
@include('formulario')
@include('bases')
@include('exito')
@endsection
