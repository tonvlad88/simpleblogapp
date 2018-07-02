@include('inc.header')

	    <!--start l-contents-->
	    <div class="l-container u-clear">

	        <!--start l-main-->
	        <main class="l-main js-main">
	            <div class="l-main-block"></div>
	            <a href=" {{ url('/admin-post/add') }}" class="l-main-button">
	                <div class="button">
	    <p class="button-text">New Article</p>
	</div>
	            </a>
	            @if(count($blogs) > 0) 
	            	<ul class="archive archive-admin">
			  		@foreach($blogs->all() as $blog)					  					    
	                
	                    <li class="archive-item">
                    		<a href=' {{ url("admin-post/$blog->id") }} ' class="post-article">
	    					<time class="post-article-date" datetime="{{ \Carbon\Carbon::parse($blog->created_at)->format('Y-m-d')}}">{{ \Carbon\Carbon::parse($blog->created_at)->format('j F, Y')}}</time>
	    					<h1 class="post-article-title">{{ $blog->title }}</h1>
							</a>
	                    </li>

			    	@endforeach
			    	</ul>
			    @else 
			    	<ul class="archive archive-admin">
	                
	                    <li class="archive-item">
		                    No blog found!
		                </li>
		            </ul>
			  	@endif		
	            
	        </main>
	        <!--end l-main-->

	    </div>
	    <!--end l-contents-->	   

@include('inc.footer')