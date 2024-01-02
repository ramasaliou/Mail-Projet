 {{-- <nav class="navbar navbar-expand-lg navbar-light bg-primary">
        <div class="container-fluid">
          <a class="navbar-brand" href="{{route('home')}}"><h4>Send-Email-App</h4></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon">ddddd</span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ">
              <li class="nav-item">
                <a class="nav-link active " aria-current="page" href="{{route('home')}}"><h5>Envoi de Email individuel</h5> </a>
              </li>
              <li class="nav-item">
                <a class="nav-link " aria-current="pag" href="{{route('homegroupe')}}"><h5>Envoi de  Email grouper</h5> </a>
              </li>
              
              <li class="nav-item">
                <a class="nav-link " href="{{route('addContactview')}}"><h5>Ajouter un contact</h5></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('listContactview')}}"><h5>Liste des contacts</h5></a>
              </li>
            </ul>
          </div>
        </div>
      </nav> --}}
      <div>
        <a class="navbar-brand" href="{{route('home')}}">SendMail-App</a>
      </div>
    <nav class="navbar  navbar-dark bg-primary ">
     
     
      
      <div class="container-fluid d-flex justify-content-end">
        <div class="d-flex justify-content-end">
          <div class="p-2">
            <ul class="navbar-nav me-auto">
            <li class="nav-item">
              <a class="nav-link" href="{{route('home')}}">Envoi de Email individuel</a>
            </li>
            </ul>
          </div>
          <div class="p-2">
            <ul class="navbar-nav me-auto">
              <li class="nav-item">
                <a class="nav-link" href="{{route('homegroupe')}}">Envoi de  Email grouper</a>
              </li>
              </ul>
          </div>
          <div class="p-2">
            <ul class="navbar-nav me-auto">
              <li class="nav-item">
                <a class="nav-link" href="{{route('addContactview')}}">Ajouter un contact</a>
              </li>
              </ul>
          </div>
          <div class="p-2">
            <ul class="navbar-nav me-auto">
              <li class="nav-item">
                <a class="nav-link" href="{{route('listContactview')}}">Liste des contacts</a>
              </li>
              </ul>
          </div>
        </div>
        
       
      </div>
    </nav>


    //////////////////////////////////////////////////////////////////////////////
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-1 m-5 " >
          
        </div> 
        <div class="col-md-2 card  m-3 border border-primary" >
            
            <div class="card-body">
              <h5 class="card-title">Admin </h5>
              <p class="card-text" "><h1><strong>{{$admine}}</strong></h1></p>
              <a href='{{route('listContactadminview')}}'>voire list</a>
            </div>
        </div>
    
          <div class=" col-md-2 card m-3 border border-secondary" >
           
            <div class="card-body">
              <h5 class="card-title">Stagiaires</h5>
              <p class="card-text" ><h1><strong>{{$stagiaire}}</strong></h1></p>
    
            </div>
          </div>
    
          <div class="col-md-2 card m-3 border border-info" >
         
            <div class="card-body ">
              <h5 class="card-title">Membres</h5>
              <p class="card-text" ><h1><strong>{{$membre}}</strong></h1></p>
            
            </div>
          </div>
          
          <div class="col-md-2 card m-3 border border-info" >
            <div class="card-body ">
              <h5 class="card-title">Total</h5>
              <p class="card-text" ><h1><strong>{{$total}}</strong></h1></p>
            
            </div>
          </div>  
          <div class="col-md-1  m-1" >
            
          </div>   
            
      </div>
     </div>
     
    </div>
    
    <div class="container ">
      {{-- <div>tableau de bord</div> --}}
    
        
        <div class="d-flex justify-content-center"">
        
        </div>
        <hr>
        <div  class="col-md-5 m-3" >
            <div class="form-group">
              <label class="m-2" for="firstName">Search</label>
              <input type="text" class="form-control" name="firstName" placeholder="Entrer your name" wire:model.debounce.350='search' >
        
          </div>
          <div>
            @if ($checkedContact)
                <button class="btn btn-info" wire:click='message()'>Nombre de contact selectionner({{ count($checkedContact)}})</button>
            @endif
           
            
          </div>
        </div>
     
        <div class="container">
        <table class="table table-striped table-light  ">
            <thead class="thead thead-info">
              <tr>
                <th scope="col">#</th>
                <th scope="col">first Name</th>
                <th scope="col">last Name</th>
                <th scope="col">email</th>
                <th scope="col">Phone</th>
                {{-- <th scope="col">Action</th> --}}
                
              </tr>
            </thead>
          @foreach($contact as $cont)
            <tbody>
              <tr>
                <td>  
                  <input  type="checkbox"  name="membre" value="{{$cont->email}}" wire:model="checkedContact" >
                  <img class="rounded mx-auto d-block" style="width: 50px;height:50px;" src="{{asset('/image/images.png')}}" alt="">
                </td> 
                {{-- <td>{{$cont->id}}</td> --}}
                <td>{{$cont->firstName}}</td>
                <td>{{$cont->lastName}}</td>
                <td>{{$cont->email}}</td>
                <td>{{$cont->phone}}</td>
                {{-- <td>
                  <div class="btn-group ">
                    <button class="btn btn-danger btn-sm " wire:click="deleteContact({{$cont->id}})">Delete</button>
                    
                    <button class="btn btn-success btn-sm ">Edit</button>
                  </div>
                </td> --}}
                
              </tr>
            </tbody>
            @endforeach
          </table>
          <div class="d-flex pb-0 pt-2 border m-3 justify-content-center">
          @if(count($contact))
            {{ $contact->links('livewire-pagination') }}
          @endif
          </div>
        </div>
    </div>
    