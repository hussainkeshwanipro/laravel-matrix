@if ($message = Session::get('success'))
<section class="notification-block mt-3">
    <div class="container-fluid">
        <div class="alert alert-success">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <p>{{ $message }}</p>
        </div>
    </div>
</section>
@endif

@if ($alert = Session::get('error'))
<section class="notification-block mt-3">
    <div class="container-fluid">
        <div class="alert alert-danger">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <p>{{ $alert }}</p>
        </div>
    </div>
</section>
@endif

@if ($message = Session::get('warning'))
    <div class="alert alert-warning">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <p>{{ $message }}</p>
    </div>
@endif

@if ($message = Session::get('message'))
<section class="notification-block mt-3">
    <div class="container-fluid">
        <div class="alert alert-info">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <p>{{ $message }}</p>
        </div>
    </div>
</section>
@endif

@if (count($errors) > 0)
<section class="notification-block">
    <div class="container-fluid">
        <div class="alert alert-danger mt-3">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Whoops!</strong> There were some problems occured.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
</section>
@endif

{!! Form::open(['document' => 'update','id'=>'editprofileform','files'=>true]) !!}
                                               
{{ csrf_field() }}
row:<input type="text" name="row">
column:<input type="text" name="column">
<button type="submit" value="Submit">Submit</button>
  {!! Form::close() !!}