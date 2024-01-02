<div class="row justify-content-center ">
    <div class="col-md-8 m-5" >
        <label>Send Email individuel</label>
    <div class="p-4 border-2 border border-secondary rounded-5">
   
        
        <form action="{{route('sendMail')}}" method="post" enctype="multipart/form-data">
            @csrf

            @if (Session::has('error'))
                <div class="alert alert-danger">
                    {{Session::get('error')}}
                </div>
            @endif

            @if (Session::has('success'))
            <div class="alert alert-success">
                {{Session::get('success')}}
            </div>
                
            @endif
            @if (Session::has('error'))
            <div class="alert alert-success">
                {{Session::get('errormail')}}
            </div>
                
            @endif
            {{-- <div class="form-group d-flex flex-row bd-highlight mb-3">
                <div class="form-check m-3">
                    <input class="form-check-input" type="radio"  name="typemail" value="grouper" >
                    <label class="form-check-label" for="email">
                     Grouper
                    </label>
                  </div>
                  <div class="form-check m-3">
                    <input class="form-check-input" type="radio"name="typemail" value="individuel">
                    <label class="form-check-label" for="email">
                        Individuel
                    </label>
                  </div>
                
                  
            </div> --}}

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" placeholder="Entrer your name" value="{{old('name')}}">
                @error('name')<span class="text-danger">{{$message}}</span>@enderror
            </div>
            <div class="form-group">
                <label for="text">Email</label>
                <input type="email" class="form-control" name="email" placeholder="Entrer your email" value="{{old('email')}}">
                @error('email')<span class="text-danger">{{$message}}</span>@enderror
            </div>
            <div class="form-group">
                <label for="subject">Subject</label>
                <input type="text" class="form-control" name="subject" placeholder="Entrer your subject" value="{{old('subject')}}">
                @error('subject')<span class="text-danger">{{$message}}</span>@enderror
            </div>
            <div class="form-group">
                <label for="message">Message</label>
                {{-- <textarea type="text" cols="4" rows="4" class="form-control" name="message" placeholder="Entrer your message" value="{{old('message')}}"></textarea> --}}
                <textarea name="message" id="myeditorinstance"></textarea>
                @error('name')<span class="text-danger">{{$message}}</span>@enderror
            </div>
            <div class="form-group">
                <label for="subject">Add file</label>
                <input type="file" class="form-control" name="piecejoint" placeholder="piecejoint" value="{{old('piecejoint')}}">
            </div>


            <button type="submit" class="btn btn-primary m-3" >Send</button>

        </form>
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
    </div>

</div>