<!-- footer -->

<footer id="footer" class="footer bg-black pt-5 ps-5 pe-5 pb-3">
  <div class="container-fluid footer-content position-relative">
    <div class="row justify-content-between">
      <div class="col-12 col-lg-4 col-md-3 borderFooter">
        <h4 class="hr text-uppercase text-md-start text-center">Contattataci</h4>
        <p class="pt-3 py-3 fs-5">
          <i class="fa-solid fa-location-dot"></i>
          Via Lemani, 96 <br>
          BA 70132, ITA <br>
          <p> <strong>Phone:</strong> +1 5589 55488 55<br>
            <strong>Email:</strong> codevengers@example.com<br>
          </p>
          <div class="mt-5"> 
            <i class="fa-brands icons-footer fa-facebook fs-2"></i>
            <i class="fa-brands icons-footer fa-instagram fs-2 mx-5"></i> 
            <i class="fa-brands icons-footer fa-linkedin fs-2"></i>
          </div>
        </p>
      </div>
      <!-- footer links column-->
      
      <div class="col-12 col-md-3">
        <h5 class="hr text-uppercase mt-3 text-md-start text-center">Link Utili</h5>
        <ul class="list-unstyled text-md-start text-center">
          <li class="list-item"><a href="#" class="btn textColor fs-5">Home</a></li>
          <li class="list-item"><a href="#" class="btn textColor fs-5">Chi Siamo</a></li>
          <li class="list-item"><a href="#" class="btn textColor fs-5">Servizi</a></li>
          <li class="list-item"><a href="#" class="btn textColor fs-5">Termini di servizio</a></li>
          <li class="list-item"><a href="#" class="btn textColor fs-5">Privacy Policy</a></li>
        </ul>
      </div>
      
      <div class="col-12 col-md-3">
        @auth
          @if (Auth::user()->is_revisor==false)
            <h6 class="hr text-uppercase mt-3 text-md-start text-center">Vuoi diventare un nostro revisore?</h6>
            <ul class="list-group list-unstyled text-md-start text-center">
              <li class="list-item"><a href="{{route('become.revisor')}}" class="btn textColor fs-5">Inviaci la tua candidatura!</a></li>
            </ul>
          @endif
        @else
        Benvenuto utente
        @endauth

        
      </div>
    </div> 
    
    
    <div class="footer-legal text-center pt-5 mt-3">
      <div class="row justify-content-center">
        <div class="copyright fs-6">
          © Copyright <strong><span>Codevengers</span></strong>. All Rights Reserved.
        </div>
        <div class="credits">
          Designed by <a class="text-decoration-none secColor" href="https://github.com/Manumi93">Minenna M. Emanuela</a><span class="text-white">,</span> <a class="text-decoration-none secColor" href="https://github.com/alessandraScotto">
            Scotto di Luzio Ida Alessandra</a><span class="text-white">,</span> <a class="text-decoration-none secColor" href="https://github.com/SabrinaCherubini"> Cherubini Sabrina</a><span class="text-white">,</span> 
            <a class="text-decoration-none secColor" href="https://github.com/MarcoInc">Sotera Marco</a><span class="text-white">,</span> <a class="text-decoration-none secColor" href="https://github.com/RiccardoDipietro?tab=repositories">Dipietro Riccardo</a>. Distributed by Codevenegers.</a>
          </div>
        </div>
      </div>
      
    </div>
  </footer>