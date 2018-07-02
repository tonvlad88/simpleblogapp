@include('inc.header')

	    <!--start l-contents-->
	    <div class="l-container u-clear">

	        <!--start l-main-->
	        <main class="l-main js-main">
	            <div class="l-main-block"></div>
	            @if (isset($blog) && $blog->id > 0)
            		<form method="post" class="form" enctype="multipart/form-data" action="{{ url('admin-post', array($blog->id)) }}" >
            	@else
            		<form method="post" class="form" enctype="multipart/form-data" action="{{ url('admin-post', 0) }}" >
            	@endif
	            
	            	{{ csrf_field() }}
	                <label for="image" class="form-title">EYE CATCH IMAGE
	                    <div class="form-file u-clear">
	                        <span class="form-file-button">UPLOAD</span>
	                    </div>
	                </label>
	                <input type="file" name="filename" id="image" class="input input-image">
	                <label for="title" class="form-title">TITLE</label>
	                <div class="form-body">
	                	@if (isset($blog) && $blog->id > 0)
	                		<input type="text" name="title" value= "{{ $blog->title }}" id="title" class="input input-text">
	                	@else
	                		<input type="text" name="title" value= "{{ old('title') }}" id="title" class="input input-text">
	                	@endif
	                    
	                </div>
	                <label for="contents" class="form-title">CONTENTS</label>
	                <div class="form-textarea">
	                	@if (isset($blog) && $blog->id > 0)
	                		<textarea name="contents" id="inquiry" cols="30" rows="10" class="input input-contents">{{ $blog->contents }}</textarea>
	                	@else
	                		<textarea name="contents" id="inquiry" cols="30" rows="10" class="input input-contents">{{ old('contents') }}</textarea>
	                	@endif
	                    
	                </div>

	                @if (count($errors) > 0)
	                <div class="form-button"></div>
						@foreach($errors->all() as $key => $error)
							<div class="alert alert-dismissible alert-danger">
							  <button type="button" class="close" data-dismiss="alert">&times;</button>
							  {{ str_replace('filename', 'eye catch image ', $error) }}
							</div>
		
						@endforeach
					@endif

	                <label for="submit" class="form-button">
	                    <div class="button">
	    					<p class="button-text">
	    						@if (isset($blog) && $blog->id > 0)
			                		Update
			                	@else
			                		Submit
			                	@endif
	    					
	    					</p>
						</div>
	                </label>
	                <input type="submit" id="submit" class="input input-submit">
	                <a href=" {{ url('/admin-list') }} " class="form-button">
	                    <div class="button">
	    <p class="button-text">Back</p>
	</div>
	                </a>
	            </form>
	        </main>
	        <!--end l-main-->

	    </div>
	    <!--end l-contents-->

	   
@include('inc.footer')