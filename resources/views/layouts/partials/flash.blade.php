	<div  style="margin-left: -20px;margin-right: -20px;">
	    @include('flash::message')	    
	</div>
	
	@if (count($errors) > 0)

	    <div class="row alert alert-danger" style="margin-left: -20px;margin-right: -20px;">
	        <ul>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>

	@endif