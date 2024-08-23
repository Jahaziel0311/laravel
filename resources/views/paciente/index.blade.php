@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Dashboard'])
    <div class="container-fluid py-4">
        
        <div class="row mt-4">

          @foreach($pantalla_menu->sub_menu($pantalla_menu->id,Auth::user()->rol->id) as $sub_menu)
            
          @endforeach
            
           
        </div>
        
        @include('layouts.footers.auth.footer')
    </div>
@endsection

