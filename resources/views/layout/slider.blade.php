@php
    $sliders = \App\Slider::all();
    // print_r($sliders);
@endphp
<style>
  @media only screen and (max-width: 600px) {
    .carousel-item {
      background-size: contain;
      height: 25vh;
      min-height: 200px;
    }
  }
</style>
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="margin-top: 0px;">
    <ol class="carousel-indicators">
        @if ($sliders)
            @foreach ($sliders as $key=>$slider)
                {{-- <li data-target="#carouselExampleIndicators" data-slide-to="{{ $key }}" class="<?php if($key == 0){ echo 'active'; }?>"></li> --}}
            @endforeach
        @else
        @endif
    </ol>
    <div class="carousel-inner" role="listbox">
      <!-- Slide One - Set the background image for this slide in the line below -->
    @if ($sliders)
        @foreach ($sliders as $key=>$slider)
            <div class="carousel-item <?php if($key == 0){ echo 'active'; }?>" style="background-image: url('{{ asset('public/slider/').'/'.$slider->image }}')">
                <div class="carousel-caption d-none d-md-block">
                <h2 class="display-4" style="color:{{ $slider->title_color }}">{{ $slider->title }}</h2>
                <p class="lead" style="color:{{ $slider->description_color }}"><b>{{ $slider->description }}</b></p>
                </div>
            </div>
        @endforeach
    @else
    <!-- Slide Two - Set the background image for this slide in the line below -->
      <div class="carousel-item active" style="background-image: url('{{ asset('public/slider/slider1.jpg') }}')">
        <div class="carousel-caption d-none d-md-block">
          <h2 class="display-4">Demo Slider</h2>
          <p class="lead">This is a description for the demo slide.</p>
        </div>
      </div>
    @endif
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
    </a>
</div>