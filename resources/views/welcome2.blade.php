@extends('app')


@section('content')
<div class="container-fluid mt-5 ">

<div class="row">
<div class="col-md-2">
  
</div>
        <div class="col-md-8 text-ligth pb-5" >
            <h2 class="fw-bold">Envoi de Mail Groupé</h2>
            <div class="p-4 border-2 border border-secondary rounded-5">
            
            <form action="{{route('sendMailgroupe')}}" method="post" enctype="multipart/form-data">
                @csrf

                @if (Session::has('error2'))
                    <div class="alert alert-danger">
                        {{Session::get('error')}}
                    </div>
                @endif

                @if (Session::has('success2'))
                <div class="alert alert-success">
                    {{Session::get('success')}}
                </div>
                    
                @endif
                {{-- @if (Session::has('error'))
                <div class="alert alert-success">
                    {{Session::get('errormail')}}
                </div>
                    
                @endif --}}
         
               
                <div class="form-group">
                    <div class="form-group d-flex flex-row bd-highlight mb-3">
                        <div class="form-check m-3">
                            <input class="form-check-input" type="checkbox"  name="membre" value="membre" >
                            <label class="form-check-label" for="Membre">
                             Membre
                            </label>
                          </div>
                          <div class="form-check m-3">
                            <input class="form-check-input" type="checkbox"name="admine" value="admine">
                            <label class="form-check-label" for="Admine">
                              Admin
                            </label>
                          </div>
                          <div class="form-check m-3">
                            <input class="form-check-input" type="checkbox"  name="stagiaire" value="stagiaire" >
                            <label class="form-check-label" for="Stagiaire" checked >
                             Stagiaire
                            </label>
                          </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="subject">Subject</label>
                    <input type="text" class="form-control" name="subject" placeholder="subject" value="{{old('subject')}}">
                    @error('subject')<span class="text-danger">{{$message}}</span>@enderror
                </div>
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea id="myeditorinstance" type="text" cols="4" rows="4" class="form-control" name="message" placeholder="message" value="{{old('message')}}"></textarea>
                    @error('name')<span class="text-danger">{{$message}}</span>@enderror
                </div>
                <div class="form-group">
                    <label for="subject">Subject</label>
                    <input type="file" class="form-control" name="piecejoint" placeholder="piecejoint" value="{{old('piecejoint')}}">
                </div>


                <button type="submit" class="btn btn-primary m-3" >Send</button>
            </form>
        </div>

        <div class="col-md-2">
  
        </div>
    </div>
</div>
        <script>
            tinymce.init({
selector: 'textarea#myeditorinstance',
plugins: 'code',
menu: {
    happy: {title: 'Happy', items: 'code'}
},
menubar: 'none'
});
</script>
        <div class="col-md-3">
  
        </div>
     </div>
    
@endsection