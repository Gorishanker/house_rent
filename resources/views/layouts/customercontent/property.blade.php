<!-- ====== Apartments Area ====== -->
<div class="apartments-area bg-gray-color">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading-content-one border">
                    <h2 class="title">Rooms &amp; Apartments</h2>
                    <h5 class="sub-title">Find Your Rooms, for your abaility</h5>
                </div><!-- /.Apartments-heading-content -->
            </div><!-- /.col-md-12 -->
        </div><!-- /.row -->
        <div class="row">
            @foreach ($properties as $property)
            <div class="col-md-4 col-sm-6 col-xs-6">
                <div class="apartments-content">
                    <div class="image-content">
                       {{-- <a href="{{ url('/') }}/houserent/single_house/{{ $property->id }}"><img src="{{asset ('assets/images/apartment/apartment-one.png') }}" alt="apartment" /><a> --}}
                       <a href="{{ route('single_house',$property->id) }}"><img src="{{asset ('storage/files/properties/1668164393_636e2b29df6d9.jpg') }}" alt="apartment" /><a>

                    </div><!-- /.image-content -->

                    <div class="text-content">
                        <div class="top-content">
                           <h3><a href="{{ route('single_house',$property->id) }}">{{ $property->title }}</a></h3>
                           <span>
                               <i class="fa fa-map-marker"></i>
                               {{ $property->address }}
                           </span>
                        </div><!-- /.top-content -->
                        <div class="bottom-content clearfix">
                            <div class="meta-bed-room">
                               <i class="fa fa-bed"></i> 3 Bedrooms
                            </div>
                            <div class="meta-bath-room">
                               <i class="fa fa-bath"></i>2 Bathroom
                            </div>
                            <span class="clearfix"></span>
                            <div class="rent-price pull-left">
                               {{ $property->price }}
                            </div>
                            <div class="share-meta dropup pull-right">
                                <ul>
                                    <li class="dropup">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-share-alt"></i></a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="#"><i class="fa fa-facebook"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="fa fa-twitter"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="fa fa-instagram"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="fa fa-google-plus"></i></a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                       <a href="#"><i class="fa fa-star-o"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div><!-- /.bottom-content -->
                    </div><!-- /.text-content -->
                </div><!-- /.partments-content -->
            </div><!-- /.col-md-4 -->
            @endforeach

        <a href="#" class="button nevy-button">All Apartments</a>
    </div><!-- /.container -->
</div><!-- /.Apartments-area-->
