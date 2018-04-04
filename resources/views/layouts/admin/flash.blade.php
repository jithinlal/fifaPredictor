<div class="flash-message">
  @foreach (['danger', 'warning', 'success', 'info'] as $msg)
    @if(Session::has('alert-' . $msg))
	    <div class="alert alert-{{ $msg }} alert-dismissible fade in" id="flash_message">
		  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		  {{ Session::get('alert-' . $msg) }}
		</div>
    @endif
  @endforeach
</div>
