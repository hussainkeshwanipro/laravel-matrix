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

<form method="POST" role="form" action="{{route('matrixData')}}">
	{{ csrf_field() }}
<?php
	$crtable = '';
		$crtable .= '<table border="1">';
		for ($i = 0; $i < $Data['row']; $i++) {
			$crtable .= '<tr>';
			for ($j = 0; $j < $Data['column']; $j++) {
				$rowData=$i.$j;
				$crtable .= '<td width="50"><input type="text" name="matrix'.$rowData.'">&nbsp;</td>';
			}
			$crtable .= '</tr>';
		}
		$crtable .= '</table>';	

		echo $crtable;
?>
<button type="submit" value="Submit">Submit</button>
</form>