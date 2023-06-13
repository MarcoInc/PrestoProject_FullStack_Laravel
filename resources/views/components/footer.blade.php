<!-- footer -->

<footer id="footer" class="footer bg-dark pt-5 ps-5 pe-5 pb-3">
  <div class="container-fluid footer-content position-relative">
    <div class="row justify-content-around">
      <div class="col-12 col-md-3 borderRight">
        <h4 class="text-uppercase text-md-start text-center">{{__('ui.contacts')}}</h4>
        <div class=" fs-5">
          <i class="fa-solid fa-location-dot fs-6"></i>
          <p class="fs-6">
            {{__('ui.AddressFooter')}}, 0 
            ABC 123456, IT 
          </p>
          <p class="fs-6"> 
            <strong>{{__('ui.phone')}}:</strong> +1 5589 55488 55
          </p>
          <p class="fs-6">
            <strong>{{__('ui.email')}}:</strong> codevengers@example.com
          </p>
          <div class="mt-5"> 
            <i class="fa-brands icons-footer fa-facebook fs-2"></i>
            <i class="fa-brands icons-footer fa-instagram fs-2 mx-5"></i> 
            <i class="fa-brands icons-footer fa-linkedin fs-2"></i>
          </div>
        </div>
      </div>
      <!-- footer links column-->
      
      <div class="col-12 col-md-2">
        <h5 class="text-uppercase borderBottom mt-3 text-md-start text-center">{{__('ui.usefulLinksFooter')}}</h5>
        <ul class="list-unstyled text-md-start text-center">
          <li class="list-item"><a href="#" class="btn textColor fs-5">{{__('ui.usefulLinks')}}</a></li>
          {{-- <li class="list-item"><a href="#" class="btn textColor fs-5">Chi Siamo</a></li> --}}
          <li class="list-item"><a href="{{route('services')}}" class="btn textColor fs-5">{{__('ui.servicesFooter')}}</a></li>
          <li class="list-item"><a href="{{route('terms')}}" class="btn textColor fs-5"></a>{{__('ui.termsOfService')}}</li>
          <li class="list-item"><a href="{{route('privacy')}}" class="btn textColor fs-5">{{__('ui.privacyPolicy')}}</a></li>
        </ul>
      </div>
      
      <div class="col-12 col-md-2">
        <h5 class="text-uppercase borderBottom mt-3 text-md-start text-center">{{__('ui.resources')}}</h5>
        <ul class="list-unstyled text-md-start text-center">
          <li class="list-item"><a href="" class="btn textColor fs-5">HTML - CSS</a></li>
          <li class="list-item"><a href="" class="btn textColor fs-5">JavaScript</a></li>
          <li class="list-item"><a href="" class="btn textColor fs-5">PHP</a></li>
          <li class="list-item"><a href="" class="btn textColor fs-5">Laravel</a></li>
          
          
        </ul>
      </div>
      
      
      @auth
      @if (Auth::user()->is_revisor==false)
      <div class="col-12 col-md-2">
        <h5 class="fs-5 borderBottom text-uppercase mt-3 text-center">{{__('ui.wouldIsArevisorFooter')}}</h5>
        <ul class="list-group list-unstyled">
          <li class="list-item "><a href="{{route('become.revisor')}}" class="btn textColor text-center fs-5">{{__('ui.sendYourCandidature')}}</a></li>
        </ul>
        @endif
        @else
        
      </div>
      @endauth
    </div> 
    
    
    <div class="footer-legal text-center mt-3">
      <div class="row justify-content-center">
        <div class="copyright fs-6">
          © Copyright <strong><span>Codevengers</span></strong>. {{__('ui.allRightsReserved')}}
        </div>
        <div class="credits">
          Designed by <a class="text-decoration-none secColor" href="https://github.com/Manumi93">Minenna M. Emanuela</a><span class="text-white">,</span> <a class="text-decoration-none secColor" href="https://github.com/alessandraScotto">
            Scotto di Luzio Ida Alessandra</a><span class="text-white">,</span> <a class="text-decoration-none secColor" href="https://github.com/SabrinaCherubini"> Cherubini Sabrina</a><span class="text-white">,</span> 
            <a class="text-decoration-none secColor" href="https://github.com/MarcoInc">Sotera Marco</a><span class="text-white">,</span> <a class="text-decoration-none secColor" href="https://github.com/RiccardoDipietro?tab=repositories">Dipietro Riccardo</a>.{{__('ui.distributed')}} by Codevenegers.</a>
          </div>
        </div>
      </div>
      
    </div>
  </footer>