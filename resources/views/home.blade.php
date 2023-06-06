<x-layout title='Homepage'>

     <!-- section testi + carosel -->
  <section>
    
        <div class="overShadow"></div>
        <div id="carouselExampleInterval" class="carousel slide carosel-custom" data-bs-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active vh-100" data-bs-interval="10000">
              <img src="/media/" class="d-block img1" alt="foto1">
            </div>
            <div class="carousel-item vh-100" data-bs-interval="2000">
              <img src="/media/" class="d-block w-100" alt="foto2">
            </div>
            <div class="carousel-item vh-100">
              <img src="/media/" class="d-block w-100" alt="foto3">
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </section>


</x-layout>