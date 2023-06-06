<x-layout title='Homepage'>
  
  <!-- carosel -->
  <section>
    <div class="overShadow"></div>
    <div id="carouselExampleIndicators" class="carousel slide carosel-custom" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active vh-100" data-bs-interval="10000">
          <img class="foto1 img-fluid d-block w-100" src="/media/foto1.jpg"  alt="foto1">
        </div>
        <div class="carousel-item vh-100" data-bs-interval="2000">
          <img src="/media/foto2.jpg" class="d-block w-100" alt="foto2">
        </div>
        <div class="carousel-item vh-100">
          <img src="/media/foto3.jpg" class="d-block w-100 foto3" alt="foto3">
        </div>
      </div>
    </div>
  </section>
  
  
  
  
  
</x-layout>