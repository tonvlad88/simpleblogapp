@include('inc.header-user')
@include('inc.nav')

	    <!--start l-contents-->
    <div class="l-container u-clear">

        <!--start l-main-->
        <main class="l-main js-main">
            <div class="l-main-block"></div>
            <div class="archive">
                <ul class="archive-list">

                	@if(count($blogs) > 0) 		            	
				  		@foreach($blogs->all() as $blog)					  					    		                
		                    <li class="archive-item">
		                        <article class="card">
								    <a href=' {{ url("single/$blog->id") }} ' class="card-link">
								        <img name="image" src="{{route('image',$blog->filename)}} " alt="" class="card-image">
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
				    @else 				    			                
	                    <li class="archive-item">
		                    No blog found!
		                </li>			           
				  	@endif						                    
				</ul>
			</div>
						            
			<a href=" {{ url('archive') }}" class="archive-button">
				<div class="button">
					<p class="button-text">More</p>
				</div>
			</a>
        </main>
        <!--end l-main-->

    </div>
    <!--end l-contents-->
	    <!--end l-contents-->	   

@include('inc.footer-user')