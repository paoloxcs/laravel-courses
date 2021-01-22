@extends('layouts.front')
@section('title')
{{$curso->title}}
@endsection
@section('content')
<div class="container-fluid hero" style="background-image: url('{{asset('uploads/'.$curso->portrait)}}')">
   <div class="container">
      <div class="row pt-5 pb-5">
         <section class="col-12 col-md-8 p-2 text-white shadow-text">
            <h1 class="header-line"><small>{{$curso->type}}</small><br>{{$curso->title}}</h1>
            <h2> <small class="text-info">Dirigido por:</small><br>{{$curso->name}}</h2><br>
            <div class="d-flex flex-wrap align-items-center">
               <h4><i class="fa fa-calendar text-info" aria-hidden="true"></i> {{$curso->fecha}} </h4> &nbsp;&nbsp;&nbsp;
               <h4> <i class="fa fa-clock-o text-info" aria-hidden="true"></i> de {{$curso->schedule}}</h4>  
               {{-- <h4><i class="fas fa-map-marker-alt"></i>: <strong>OPEN PUCP</strong> <small>Av. La Marina, 5to Piso C.C. Plaza San Miguel</small></h4> --}}
            </div>
         </section>
         <section class="col-12 col-md-4 p-2">
            <div class="card">						
               <div class="card-header bg-secondary bg-gradient text-white">
                  <div class="card-title text-center">
                     <h3>¡Regístrate Ya!</h3>
                     <p>Completa tus datos y nosotros te llamamos</p>
                     @if(session('msg'))
                     <div class="alert alert-success">
                        {{session('msg')}}
                     </div>									
                     @endif
                  </div>
               </div>
               <div class="card-body">               
                  <form action="{{route('datasender')}}" method="POST">
                     {{csrf_field()}}
                     <input type="hidden" name="curso" value="{{$curso->title}}">
                     <input type="hidden" name="curso_id" value="{{$curso->id}}">
                     <div class="mb-2">       
                        <input type="text" class="form-control" id="name" name="name" placeholder="Nombres y apellidos">
                     </div>
                     <div class="mb-2">
                        <input type="number" class="form-control" id="phone" name="phone" placeholder="Nro telefonico">
                     </div>
                     <div class="mb-2">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Correo electrónico">
                     </div>
                     <div class="mb-2">
                        <textarea name="message" id="message" class="form-control" rows="3" placeholder="Deseo participar"></textarea>
                     </div>
                     <div class="d-grid gap-2">                        
                        <input type="submit" class="btn btn-dark" value="Registrar">             
                     </div>
                  </form>
               </div>         
            </div>
         </section>
      </div>
   </div>
</div>

<div class="separator-block"> &nbsp; </div>

<div class="container-fluid mt-5" id="docente">
   <div class="container">
      <div class="row"><section class="col-12"><div class="titlezone bg-dark text-white"> <p><i class="fa fa-caret-right" aria-hidden="true"></i> Sobre el docente:</p> </div></section></div>
      <div class="row mt-3">
         <section class="col-12 col-md-4 text-center p-4">

            <div class="card">
               <img src="{{asset('uploads/'.$docente->url_profile)}}" class="card-img-top circle-profile" alt="{{$docente->name}}">
               <div class="card-body text-center">
                 <h5 class="card-title"> <strong>{{$docente->name}}</strong><br><small class="text-minimalist text-secondary"> {{$docente->jobtitle}} </small></h5>

                 <div class="d-flex flex-wrapd-flex justify-content-around mt-3">
                  @foreach($redes as $social)
                     <a href="{{$social->url_social}}" class="btn btn-outline-dark"> <i class="{{$social->icon}}" aria-hidden="true"></i> </a>
                  @endforeach
                  {{-- <a href="#" class="btn btn-outline-dark"> <i class="fa fa-facebook" aria-hidden="true"></i> </a>
                  <a href="#" class="btn btn-outline-dark"> <i class="fa fa-twitter" aria-hidden="true"></i> </a>                  
                  <a href="#" class="btn btn-outline-dark"> <i class="fa fa-linkedin" aria-hidden="true"></i> </a> --}}
                 </div>
               </div>
             </div>
            
         </section>
         <section class="col-12 col-md-8 p-4">
            <h4 class="text-info">Reseña profesional:</h4>
            <p>{!!$docente->bio!!}</p>
         </section>
      </div>
   </div>
</div>

<div class="separator-block"> &nbsp; </div>

<div class="container-fluid mt-5">
   <div class="container">
      <div class="row"><section class="col-12"><div class="titlezone bg-dark text-white"> <p><i class="fa fa-caret-right" aria-hidden="true"></i> Descripción:</p> </div></section></div>
      <div class="row mt-3">
         <section class="col-12 col-md-6">
            <h4 class="text-secondary"><i class="fa fa-check-square" aria-hidden="true"></i> Objetivos:</h4>
            <p>{!!$curso->objectives!!}</p>
            <br>
            <h4 class="text-secondary"><i class="fa fa-users" aria-hidden="true"></i> Dirigido a:</h4>
            <p>{!!$curso->public!!}</p>
         </section>
         <section class="col-12 col-md-6 d-flex align-items-center">
            <img src="{{asset('uploads/'.$curso->description)}}" class="img-fluid" alt="">
         </section>
      </div>
   </div>
</div>

<div class="separator-block"> &nbsp; </div>

<div class="container-fluid mt-5" id="temas">
   <div class="container">
      <div class="row"><section class="col-12"><div class="titlezone bg-dark text-white"> <p><i class="fa fa-caret-right" aria-hidden="true"></i> Metodología:</p> </div></section></div>
      <div class="row mt-3">
         <section class="col-12 col-md-8">

            <div class="accordion" id="accordionExample">
               @foreach($sylabos as $sylabo)
               <div class="accordion-item">
                  <h2 class="accordion-header" id="encabezado{{$sylabo->id}}">
                    <button class="accordion-button bg-info bg-gradient text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#tema{{$sylabo->id}}" aria-expanded="true" aria-controls="tema{{$sylabo->id}}">
                      {{$sylabo->module}}
                    </button>
                  </h2>
                  @if($loop->iteration==1)
                  <div id="tema{{$sylabo->id}}" class="accordion-collapse collapse show" aria-labelledby="encabezado{{$sylabo->id}}" data-bs-parent="#accordionExample">
                     <div class="accordion-body">
                       {!!$sylabo->info!!}
                     </div>
                  </div>
                  @else
                  <div id="tema{{$sylabo->id}}" class="accordion-collapse collapse" aria-labelledby="encabezado{{$sylabo->id}}" data-bs-parent="#accordionExample">
                     <div class="accordion-body">
                       {!!$sylabo->info!!}
                     </div>
                  </div>
                  @endif
                  
               </div>
               @endforeach
             </div>
         </section>
         <section class="col-12 col-md-4">
            <h4 class="mt-2">Detalles del Curso</h4>
            <ul class="list-group list-group-flush">
               <li class="list-group-item d-flex align-items-around">
                  <div><h2><i class="fa fa-calendar text-info" aria-hidden="true"></i></h2></div>
                  <div class="px-2"><h5> <small>Días</small><br> <strong>{{$curso->fecha}}</strong></h5></div>
               </li>
               <li class="list-group-item d-flex align-items-around">
                  <div><h2><i class="fa fa-list-alt text-info" aria-hidden="true"></i></h2></div>
                  <div class="px-2"><h5> <small>Horario</small><br> <strong>de {{$curso->schedule}}</strong></h5></div>
               </li>
               <li class="list-group-item d-flex align-items-around">
                  <div><h2><i class="fa fa-clock-o text-info" aria-hidden="true"></i></h2></div>
                  <div class="px-2"><h5> <small>Duración</small><br> <strong>{{$curso->duration}} / {{$curso->session}} Sesiones</strong></h5></div>
               </li>
             </ul>
         </section>
      </div>
   </div>
</div>

<div class="separator-block"> &nbsp; </div>

<div class="container-fluid hero mt-5 pt-2 pb-2" style="background-image: url('{{asset('uploads/'.$curso->inversion)}}')" id="inversion">
   <div class="container bg-fader">
      <div class="row"><section class="col-12"><div class="titlezone bg-dark text-white"> <p><i class="fa fa-caret-right" aria-hidden="true"></i> Inversión:</p> </div></section></div>
      <div class="row mt-3">

         @foreach($precios as $price)

         <section class="col-12 col-md-6">
            <div class="card text-center">
               <div class="card-header bg-secondary text-info">
                  <h3>{{$price->info}}</h3>
               </div>
               <div class="card-body">
                  @if($price->promo==1)
                     <h1>S/. {{$price->amount}}</h1>
                     <h2 class="text-secondary text-decoration-line-through">S/. {{$price->dscto}}</h2>
                     <h6><small class="bg-danger text-white">Ahorre S/. {{$price->amount - $price->dscto}}</small></h6>
                  @else
                     <h1>S/. {{$price->amount}}</h1>
                  @endif
             </div>
         </section>
         @endforeach
         <section class="col-12 text-center mt-3 mb-3">
            <p>Precios incluyen IGV</p>
         </section>
      </div>
   </div>

   <div class="container bg-fader mt-4">
      <div class="row"><section class="col-12"><div class="titlezone bg-dark text-white"> <p><i class="fa fa-caret-right" aria-hidden="true"></i> Formas de pago:</p> </div></section></div>
      <div class="row mt-3">
         <section class="col-12 col-md-6">
            <div class="card">
               <div class="card-header bg-secondary text-white text-center">
                 <h4 class="shadow-text">Plataforma CONSTRUCTIVO</h4>
               </div>
               <div class="card-body">
                  <div class="row">
                     <section class="col-12 col-md-9">
                        <p class="card-text">Compre el curso directamente y reserve su participación. Reserve su cupo desde aqui.</p>                        
                     </section>
                     <section class="col-md-3 d-none d-sm-block">
                        <img src="{{asset('images/pc.png')}}" class="img-fluid" alt="">
                     </section>
                  </div>
                  <div class="row mt-3">
                     <section class="col-12 col-md-2">
                        <a href="https://plataforma.constructivo.com/curso/como-crear-un-espacio-verde-y-sostenible-5ff62a15daf11" target="_blank" class="btn btn-dark">Adquirir</a>
                     </section>
                     <section class="col-md-10 d-none d-sm-block">
                        <img src="{{asset('images/cards.png')}}" class="img-fluid" alt="">
                     </section>
                  </div>        
               </div>
             </div>
         </section>
         <section class="col-12 col-md-6">
            <div class="card">
               <div class="card-header bg-secondary text-white text-center">
                 <h4 class="shadow-text">Depósito / Transferencia</h4>
               </div>
               <div class="card-body">
                  <div class="row">
                     <section class="col-12 col-md-10">
                        <p>PULL CREATIVO COMUNICACIONES S.A.C. RUC: 20601694876</p>
                        <ul>
                           <li><strong>CTA. CTE. SOLES 193-2366918-0-60 (BCP)</strong></li>
                           <li><strong>CTA. CCI. SOLES 002-193-002366918060-18 (BCP)</strong></li>
                        </ul>
                     </section>
                     <section class="col-md-2 d-none d-sm-block">
                        <img src="{{asset('images/bcp.jpg')}}" class="img-fluid" alt="">
                     </section>
                  </div>
               </div>
             </div>
         </section>
      </div>
   </div>
</div>

<div class="separator-block"> &nbsp; </div>

<div class="container-fluid mt-5">
   <div class="container">
      <div class="row"><section class="col-12"><div class="titlezone bg-dark text-white"> <p><i class="fa fa-caret-right" aria-hidden="true"></i> Beneficios:</p> </div></section></div>
      <div class="row mt-3">
         <section class="col-12 col-md-6">
            <h4 class="text-info"><i class="fa fa-certificate" aria-hidden="true"></i> Incluye:</h4>
            <ul class="mt-3">
               @foreach($beneficios as $benefit)
               <li>{{$benefit->benefit}}</li>
               @endforeach               
               
            </ul>
         </section>
         <section class="col-12 col-md-6">
            <img src="{{asset('images/class.jpg')}}" class="img-fluid" alt="">
         </section>
      </div>
   </div>
</div>
@endsection