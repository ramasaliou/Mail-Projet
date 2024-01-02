@extends('app')


@section('content')
<div class="container-fluid mt-5 ">

<div class="row">
<div class="col-md-2">
  
</div>
        <div class="col-md-8 text-ligth pb-5" >
            <span class="fw-bold p-4">Envoie email à {{$nombre>1?$nombre:'une'}} personne{{$nombre >1?'s':''}}  {{$id}}</span>
            <div class="p-4 border-2 border border-secondary rounded-5">
            
            <form action="{{route('post.sendmailchedek')}}" method="post" enctype="multipart/form-data">
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

                <input type="hidden" class="form-control" name="email" placeholder="subject" value="{{$id}}">

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