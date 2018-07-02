@include('inc.header-user')
@include('inc.nav')

	    <!--start l-contents-->
    <div class="l-container u-clear">

        <!--start l-main-->
        <main class="l-main js-main">
            <div class="l-main-block"></div>
            <div class="archive">
                
                	@if(count($blogs) > 0) 
                		<div class="page-number">
                			Page {{$blogs->currentPage()}}/{{$blogs->lastPage()}}	
                		</div>
                		<ul class="archive-list">	            	
				  		@foreach($blogs->all() as $blog)					  				    		                
		                    <li class="archive-item">
		                        <article class="card">
								    <a href=' {{ url("single/$blog->id") }} ' class="card-link">
								        <img src="{{route('image',$blog->filename)}} " alt="" class="card-image">
								        <div class="card-bottom">
								            <h1 class="card-title">{{ $blog->title }}</h1>
								            <time class="card-date" datetime="{{ \Carbon\Carbon::parse($blog->created_at)->format('Y-m-d')}}">
								                {{ \Carbon\Carbon::parse($blog->created_at)->format('j F, Y')}}
								            </time>
								        </div>
								    </a>
								</article>
							</li>
				    	@endforeach		
				    	</ul>		    	
				    @else 	
					    <ul class="archive-list">	           			    			                
		                    <li class="archive-item">
			                    No blog found!
			                </li>
		                </ul>			           
				  	@endif						                    				
			</div>

			{{ $blogs->links('vendor.pagination.default') }}
						            			
        </main>
        <!--end l-main-->

    </div>
    <!--end l-contents-->
	    <!--end l-contents-->	   

@include('inc.footer-user')