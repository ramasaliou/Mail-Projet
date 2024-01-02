<div>
    {{-- <div>tableau de bord</div> --}}
    <div class="container-fluid mt-5">
      <div class="row">
        <div class="col-md-3">
                
        </div>
        {{-- <div class="col-md-2 card m-1  border border-primary "style="backgrounde-color: rgb(112, 144, 120);" >
                
          <div class="card-body" >
            <h5 class="card-title"><i class="fa-duotone fa-envelopes"></i> Admin </h5>
            <p class="card-text" "><h1><strong>{{$admine}}</strong></h1></p>
            
          </div>
          <a class="navbar-brand border border-primary bg-info text-center p-2 m-2" href='{{route('listContactadminview')}}'>voire list</a>
         </div> --}}
         <div class=" col-md-2 card m-1 border border-secondary"style="backgrounde-color: rgb(120, 176, 160);" >
               
          <div class="card-body">
            <h5 class="card-title">Stagiaires</h5>
            <p class="card-text" ><h1><strong>{{$stagiaire}}</strong></h1></p>
    
          </div>
          <a class="navbar-brand border border-primary bg-primary text-center p-2 m-2" href='{{route('listContactadminview')}}'>liste des Stagiares</a>
        </div>
    
        <div class="col-md-2 card m-1 border border-info" style="backgrounde-color: rgb(112, 144, 120);">
             
          <div class="card-body ">
            <h5 class="card-title">Membres</h5>
            <p class="card-text" ><h1><strong>{{$membre}}</strong></h1></p>
          
          </div>
          <a class="navbar-brand border border-primary bg-primary text-center p-2 m-2" href='{{route('listContactadminview')}}'>liste des Admins</a>
        </div>
    
        <div class="col-md-2 card m-1 border border-info"style="backgrounde-color: rgb(120, 176, 160);" >
          <div class="card-body ">
            <h5 class="card-title">Total</h5>
            <p class="card-text" ><h1><strong>{{$total}}</strong></h1></p>
          
          </div>
          <a class="navbar-brand border border-primary bg-primary text-center p-2 m-2" href="{{route('listContactview')}}" >tout les contacts </a>
        </div> 
    
    
        <div class="col-md-2">
                
        </div>
      </div>
    </div>

    <div class="container-fluid mt-5">
      <div class="row">
        <div class="col-md-2">
                
        </div>
    
        <div class="col-md-8">
            <div class=" bg-primary text-center  mb-5 fw-bold h1 " for="firstName">Liste des admins</div>
            {{-- <input type="text" class="form-control" name="firstName" placeholder="Entrer your name" wire:model.debounce.350='search' > --}}
            {{-- <div>
              @if ($checkedContact)
                  <button class="btn btn-info p-2 m-2" wire:click='message()'>Nombre de contact selectionner({{ count($checkedContact)}})</button>
              @endif
             
              
            </div> --}}
        
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
              @if ($contact)  
            @foreach($contact as $cont)
              <tbody>
                <tr>
                  <td>  
                    {{-- <input  type="checkbox"  name="membre" value="{{$cont->id}}" wire:model="" >
                    <a href = 'sendmail/{{ $cont->id }}'> --}}
                    <img class="rounded mx-auto d-block" style="width: 30px;height:30px;" src="{{asset('/image/mail.png')}}" alt="">
                   </a>
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
            {{-- <div class="d-flex pb-0 pt-2 border m-3 justify-content-center">
            @if(count($contact))
              {{ $contact->links('livewire-pagination') }}
            @endif
            </div> --}}
            @else
                  <h1>no data</h1>
            @endif
          </div>
           </div>
        </div>
    
        <div class="col-md-2">
                
        </div>
      </div>
    
    </div>
     
  </div>
  
