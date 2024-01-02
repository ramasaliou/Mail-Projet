<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset("css/app.css")}}">
    {{-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet"> --}}
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
  <script src="{{ asset('js/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>
  <script src="https://kit.fontawesome.com/37158bfb1f.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
     
  <title>Send-Mail</title>
</head>
<body>
   <nav class="navbar navbar-expand-lg navbar-light bg-primary  ">
      <a class="navbar-brand" href="{{route('home')}}"><i class="fa-solid fa-envelope m-2"></i><strong>SendMail-App</strong></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
            
        <ul class="navbar-nav ms-auto">
            <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle fs-5 fw-bold" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Envoi Email
                  </a>
                  <div class="dropdown-menu bg-primary" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{route('homegroupe')}} ">Envoi de  Email groupé</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{route('home')}}">Envoi de Email individuel</a>
                    
                   
                  </div>
                </li>
          {{-- <li class="nav-item active">
           
          </li> --}}
          {{-- <li class="nav-item">
            
          </li> --}}
          <li class="nav-item">
            <a class="nav-link fs-5 fw-bold text-dark" href="{{route('addContactview')}}">Ajouter un contact</a>
          </li>
          <li class="nav-item fs-5 fw-bold text-dark">
            <a class="nav-link" href="{{route('listContactview')}}">Liste des contacts</a>
          </li>
         
          
        </ul>
       
      </div>
    </nav>

      @yield('content')
     
      <div class="text-center pt-3 mt-3 bg-primary";">
            © 2022 Copyright:
            <a class="text-dark" href="#">Defarsci.com</a>
          </div>

{{-- 
      @livewireScripts
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" 
      integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script> --}}
      
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
      <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    </body>
    @livewireScripts
    @stack('scripts')
</html>





