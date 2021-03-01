<header class="header-home">
    <div>
        @include('partials.navbar')
        <div class="hero-home container">
           
            <div class="hero-text">
               <h1>
                    DeliveBoo, pranzo e cena a domicilio.
               </h1>
               <h2>
                   Visualizza i nostri Ristoranti
               </h2>
               <div class="restaurant-button">
                  <a class="btn-list" href="{{route('Restaurant')}}">
                   Ristoranti
                  </a>
               </div> 
            </div>
           
        </div>
    </div>

</header>
