@include('inc.header-user')
@include('inc.nav')

	 <!--start l-main-->
        <main class="l-main js-main">
            <div class="l-main-block"></div>
            <div class="single">
                <img src="{{route('image',$blog->filename)}}" alt="" class="single-image">
                <div class="l-container u-clear">
                    <h1 class="single-title"> {{ $blog->title }} </h1>
                    <time class="single-date" datetime="{{ \Carbon\Carbon::parse($blog->created_at)->format('Y-m-d')}}">{{ \Carbon\Carbon::parse($blog->created_at)->format('j F, Y')}}</time>
                    <p class="single-desc">{{ $blog->contents }}</p>
                    <div class="single-button">
                        <div class="button">
						    <a href="{{ url('/') }}" ><p class="button-text">Top</p></a>
						</div>
                    </div>
                </div>
            </div>
        </main>
        <!--end l-main-->

    </div>
    <!--end l-contents-->

@include('inc.footer-user')