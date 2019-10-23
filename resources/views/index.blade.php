@extends('layouts.app')

@section('content')

<section>

  <div id="carouselId" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
          <li data-target="#carouselId" data-slide-to="0" class="active"></li>
          <li data-target="#carouselId" data-slide-to="1"></li>
          <li data-target="#carouselId" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" style="height:450px;" role="listbox">
          <div class="carousel-item active">
              <img width="100%" height="450" src="/image/Background-1.jpg" alt="First slide">
          </div>
          <div class="carousel-item">
                  <img width="100%" height="450"  src="/image/Background-2.jpg" alt="Second slide"> </div>
          <div class="carousel-item">
                  <img width="100%" height="450" src="/image/r.jpg" alt="Third slide"> </div>
      </div>
      <a class="carousel-control-prev" href="#carouselId" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselId" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
      </a>

</div>
</section>


@endsection