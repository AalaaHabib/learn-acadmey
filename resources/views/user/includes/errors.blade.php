

    @if($errors->any())
        @foreach($errors->all() as $error)
            <div class="alert alert-danger mt-2" role="alert">
                <strong>{{$error}}</strong>
            </div>
         @endforeach
    @endif
   