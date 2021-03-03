<header class="header-home">
    <div>
        @include('partials.navbar')
        <div class="hero-home container">
           
            <div class="hero-text">
               <h1>
                    Your Favorite Food, on the way!
               </h1>
               <div class="d-flex align-items-center
">
                   <h2 class="d-inline">
                       Go to 
                   </h2>
                   <div >
                      <a class="d-block btn-list " href="{{route('Restaurant')}}">
                       Restaurant
                      </a>
                   </div> 
               </div>
            </div>
           
        </div>
    </div>

</header>
