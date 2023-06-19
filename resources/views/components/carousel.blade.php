<section class="position-relative ">
    <div class="overShadow d-flex justify-content-center align-items-center">
        <div class="chevronHome text-white position-absolute text-center">
            <p class="fs-3">{{__('ui.latestArticles')}}  </p>
            <a class="text-white" href="#scrollAnnunci">
                <i class="fa-solid fa-circle-chevron-down fa-bounce fs-3"></i>
            </a>
        </div>
    </div>
    <div id="carouselExampleIndicators" class="carousel slide vhCarousel " data-bs-ride="carousel">
        
        <div class="carousel-inner position-relative">
            <div class="carousel-item active" data-bs-interval="5000">
                <img  src="/media/foto1.jpg" class="d-block w-100 fotoCarousel objectPositionfoto" alt="foto1">
            </div>
            <div class="carousel-item" data-bs-interval="2000">
                <img src="/media/foto2.jpg" class="d-block w-100 fotoCarousel" alt="foto2">
            </div>
            <div class="carousel-item">
                <img src="/media/foto3.jpg" class="d-block w-100 fotoCarousel objectPositionfoto" alt="foto3">
            </div>
        </div>
        <div class="carousel-indicators btnCarousel d-flex align-items-center position-absolute bottom-0">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
    </div>
</section>