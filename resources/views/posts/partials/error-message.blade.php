@if($errors->has($fieldTitle))
    <div class="alert alert-danger alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        @foreach($errors->get($fieldTitle) as $error)
            <li> {{ $error }}</li>
        @endforeach
    </div>
@endif