@include('inc.header')	

	    <!--start l-contents-->
	    <div class="l-container u-clear">

	        <!--start l-main-->
	        <main class="l-main js-main">
	            <div class="l-main-block"></div>
	            <form method="post" class="form" action=" {{ url('login') }}" >
	            	{{ csrf_field() }}
	                <label for="user-id" class="form-title">USER ID</label>
	                <input value="{{ old('user-id') }}" type="text" name="user-id" id="user-id" class="input input-text">
	                <label for="password" class="form-title">PASSWORD</label>
	                <input type="password" name="password" id="password" class="input input-text">
	                
	                @if (count($errors) > 0)
	                <div class="form-button"></div>
						@foreach($errors->all() as $key => $error)
							<div class="alert alert-dismissible alert-danger">
							  <button type="button" class="close" data-dismiss="alert">&times;</button>
							  {{ str_replace('user-id', 'user id', $error) }}
							</div>
		
						@endforeach
					@endif

					@if(session('error'))
						<div class="form-button"></div>
						<div class="alert alert-danger">{{session('error')}}</div>
					@endif

	                <label for="submit" class="form-button">
	                    <div class="button">
	    <p class="button-text">Login</p>
	</div>
	                </label>	               								
	                    <input type="submit" id="submit" class="input input-submit">
	            </form>
	        </main>
	        <!--end l-main-->

	    </div>
	    <!--end l-contents-->

	  

@include('inc.footer')