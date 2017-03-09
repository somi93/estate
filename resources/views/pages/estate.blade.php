@extends('layout')

@section('content')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/estate.css') }}" />
    <input type="hidden" id="page" value="estate"/>
    <div class="container" ng-controller="estate">
        <div class="detail-top detail-top-grid no-margin">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-xs-12">
                        <div class="header-detail table-list">
                            <div class="header-left">
                                <h1>
                                    @{{ singleEstate.title }}
                                </h1>
                                <address class="property-address">
                                    @{{ singleEstate.street+", "+singleEstate.areaname+", "+singleEstate.city }}
                                </address>
                            </div>
                            <div class="header-right">
                                <span class="item-price">@{{ singleEstate.price }} &euro;</span>
                                <span class="item-sub-price">@{{ singleEstate.area }} sq.</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--start detail content-->
        <section class="section-detail-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 container-contentbar">
                        <div class="detail-bar">
                            <div class="detail-media detail-top-slideshow">
                                <div class="tab-content">
                                    <div id="gallery" class="tab-pane fade in active">
                                        <span class="label-wrap visible-sm visible-xs">
                                        <span class="label label-primary">For Sale</span>
                                        <span class="label label-danger">Sold</span>
                                    </span>
                                        <div class="slideshow">
                                            <div class="slideshow-main">
                                                <div class="slide">
                                                    <div>
                                                        <img src="{{ asset('img/property_1.jpg') }}" width="810" height="430" alt="Slide show">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="map" class="tab-pane fade"></div>
                                    <div id="street-map" class="tab-pane fade"></div>
                                </div>
                            </div>

                            <div class="property-description detail-block">
                                <div class="detail-title">
                                    <h2 class="title-left">Description</h2>
                                    <div class="title-right">
                                        <a href="#">Flag this listing <i class="fa fa-flag"></i></a>
                                    </div>
                                </div>
                                <p>@{{ singleEstate.description }}</p>
                            </div>
                            <div class="detail-address detail-block">
                                <div class="detail-title">
                                    <h2 class="title-left">Address</h2>
                                </div>
                                <ul class="list-three-col">
                                    <li><strong>Address:</strong> @{{ singleEstate.street+", "+singleEstate.areaname+", "+singleEstate.city }}</li>
                                    <li><strong>City:</strong> @{{ singleEstate.city }}</li>
                                    <li><strong>Area:</strong> @{{ singleEstate.areaname }}</li>
                                    <li><strong>Street:</strong> @{{ singleEstate.street }}</li>
                                </ul>
                            </div>
                            <div class="detail-features detail-block">
                                <div class="detail-title">
                                    <h2 class="title-left">Heating</h2>
                                </div>
                                <ul class="list-three-col list-features">
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-close" ng-if="singleEstate.central_heating==0"></i>
                                            <i class="fa fa-check" ng-if="singleEstate.central_heating==1"></i>
                                            Central Heating
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-close" ng-if="singleEstate.ta==0"></i>
                                            <i class="fa fa-check" ng-if="singleEstate.ta==1"></i>
                                            TA
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-close" ng-if="singleEstate.current_heating==0"></i>
                                            <i class="fa fa-check" ng-if="singleEstate.current_heating==1"></i>
                                            Current Heating
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-close" ng-if="singleEstate.etag_heating==0"></i>
                                            <i class="fa fa-check" ng-if="singleEstate.etag_heating==1"></i>
                                            Etag Heating
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-close" ng-if="singleEstate.floor_heating==0"></i>
                                            <i class="fa fa-check" ng-if="singleEstate.floor_heating==1"></i>
                                            Floor Heating
                                        </a>
                                    </li>
                                </ul>
                            </div>

                            <div class="detail-features detail-block">
                                <div class="detail-title">
                                    <h2 class="title-left">Facilities</h2>
                                </div>
                                <ul class="list-three-col list-features">
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-close" ng-if="singleEstate.internet==0"></i>
                                            <i class="fa fa-check" ng-if="singleEstate.internet==1"></i>
                                            Internet
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-close" ng-if="singleEstate.tv==0"></i>
                                            <i class="fa fa-check" ng-if="singleEstate.tv==1"></i>
                                            TV
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-close" ng-if="singleEstate.fridge==0"></i>
                                            <i class="fa fa-check" ng-if="singleEstate.fridge==1"></i>
                                            Fridge
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-close" ng-if="singleEstate.climate==0"></i>
                                            <i class="fa fa-check" ng-if="singleEstate.climate==1"></i>
                                            Climate
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-close" ng-if="singleEstate.intercom==0"></i>
                                            <i class="fa fa-check" ng-if="singleEstate.intercom==1"></i>
                                            Intercom
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-close" ng-if="singleEstate.cameras==0"></i>
                                            <i class="fa fa-check" ng-if="singleEstate.cameras==1"></i>
                                            Cameras
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-close" ng-if="singleEstate.elevator==0"></i>
                                            <i class="fa fa-check" ng-if="singleEstate.elevator==1"></i>
                                            Elevator
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-close" ng-if="singleEstate.parking==0"></i>
                                            <i class="fa fa-check" ng-if="singleEstate.parking==1"></i>
                                            Parking
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-close" ng-if="singleEstate.garage==0"></i>
                                            <i class="fa fa-check" ng-if="singleEstate.garage==1"></i>
                                            Garage
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="detail-contact detail-block">
                                <div class="detail-title">
                                    <h2 class="title-left">Contact info</h2>
                                </div>
                                <div class="media agent-media">
                                    <div class="media-body">
                                        <ul>
                                            <li><i class="fa fa-user"></i> Some Person</li>
                                            <li>
                                                <span><i class="fa fa-phone"></i> 011-242 4312</span>
                                            </li>
                                            <li>
                                                <span><i class="fa fa-mobile"></i>  064-495 5323</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="detail-title-inner">
                                    <h4 class="title-inner">Send message</h4>
                                </div>
                                <form>
                                    <div class="row">
                                        <div class="col-sm-4 col-xs-12">
                                            <div class="form-group">
                                                <input class="form-control" placeholder="Your Name" type="text">
                                            </div>
                                        </div>
                                        <div class="col-sm-4 col-xs-12">
                                            <div class="form-group">
                                                <input class="form-control" placeholder="Phone" type="text">
                                            </div>
                                        </div>
                                        <div class="col-sm-4 col-xs-12">
                                            <div class="form-group">
                                                <input class="form-control" placeholder="Email" type="email">
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <textarea class="form-control" rows="5" placeholder="Message"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="btn btn-secondary">Request info</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 col-md-offset-0 col-sm-offset-3 container-sidebar">
                        <aside id="sidebar" class="sidebar-white">
                            <div class="widget widget-recommend">
                                <div class="widget-top">
                                    <h3 class="widget-title">We recommend</h3>
                                </div>
                                <div class="widget-body">
                                    <div class="media" ng-repeat="estate in estates | limitTo:4">
                                        <div class="media-left">
                                            <figure class="item-thumb">
                                                <a class="hover-effect" href="#">
                                                    <img src="{{ asset('img/property_3.jpg') }}" width="100" height="75" alt="thumb">
                                                </a>
                                            </figure>
                                        </div>
                                        <div class="media-body">
                                            <h3 class="media-heading"><a href="#">@{{ estate.title }}</a></h3>
                                            <h4>@{{ estate.price }} &euro;</h4>
                                            <div class="amenities">
                                                <p>@{{ estate.city+", "+estate.area }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="widget widget-slider">
                                <div class="widget-top">
                                    <h3 class="widget-title">Featured Properties</h3>
                                </div>
                                <div class="widget-body">
                                    <div class="property-widget-slider">
                                        <div class="item">
                                            <div class="figure-block">
                                                <figure class="item-thumb">
                                                    <div class="label-wrap label-right featured_label">
                                                        <span class="label-status label label-default">For Rent</span>

                                                        <span class="label label-danger">Hot Offer</span>
                                                    </div>
                                                    <a href="#" class="hover-effect">
                                                        <img src="{{ asset('img/property_3.jpg') }}" width="370" height="202" alt="thumb">
                                                    </a>
                                                    <div class="price">
                                                        <span class="item-price">$350,000</span>
                                                    </div>
                                                    <ul class="actions">
                                                        <li>
                                                    <span title="" data-placement="top" data-toggle="tooltip" data-original-title="Favorite">
                                                        <i class="fa fa-heart-o"></i>
                                                    </span>
                                                        </li>
                                                        <li class="share-btn">
                                                            <div class="share_tooltip fade">
                                                                <a target="_blank" href="#"><i class="fa fa-facebook"></i></a>
                                                                <a target="_blank" href="#"><i class="fa fa-twitter"></i></a>
                                                                <a target="_blank" href="#"><i class="fa fa-google-plus"></i></a>
                                                                <a target="_blank" href="#"><i class="fa fa-pinterest"></i></a>
                                                            </div>
                                                            <span title="" data-placement="top" data-toggle="tooltip" data-original-title="share"><i class="fa fa-share-alt"></i></span>
                                                        </li>
                                                    </ul>
                                                </figure>
                                            </div>
                                        </div>
                                        <div class="hidden item">
                                            <div class="figure-block">
                                                <figure class="item-thumb">
                                                    <span class="label-featured label label-success">Featured</span>
                                                    <div class="label-wrap label-right">
                                                        <span class="label-status label label-default">For Rent</span>

                                                        <span class="label label-danger">Hot Offer</span>
                                                    </div>
                                                    <a href="#" class="hover-effect">
                                                        <img src="{{ asset('img/property_2.jpg') }}" width="370" height="202" alt="thumb">
                                                    </a>
                                                    <div class="price">
                                                        <span class="item-price">$350,000</span>
                                                    </div>
                                                    <ul class="actions">
                                                        <li>
                                                    <span title="" data-placement="top" data-toggle="tooltip" data-original-title="Favorite">
                                                        <i class="fa fa-heart-o"></i>
                                                    </span>
                                                        </li>
                                                        <li class="share-btn">
                                                            <div class="share_tooltip fade">
                                                                <a target="_blank" href="#"><i class="fa fa-facebook"></i></a>
                                                                <a target="_blank" href="#"><i class="fa fa-twitter"></i></a>
                                                                <a target="_blank" href="#"><i class="fa fa-google-plus"></i></a>
                                                                <a target="_blank" href="#"><i class="fa fa-pinterest"></i></a>
                                                            </div>
                                                            <span title="" data-placement="top" data-toggle="tooltip" data-original-title="share"><i class="fa fa-share-alt"></i></span>
                                                        </li>
                                                    </ul>
                                                </figure>
                                            </div>
                                        </div>
                                        <div class="hidden item">
                                            <div class="figure-block">
                                                <figure class="item-thumb">
                                                    <span class="label-featured label label-success">Featured</span>
                                                    <div class="label-wrap label-right">
                                                        <span class="label-status label label-default">For Rent</span>

                                                        <span class="label label-danger">Hot Offer</span>
                                                    </div>
                                                    <a href="#" class="hover-effect">
                                                        <img src="{{ asset('img/property_1.jpg') }}" width="370" height="202" alt="thumb">
                                                    </a>
                                                    <div class="price">
                                                        <span class="item-price">$350,000</span>
                                                    </div>
                                                    <ul class="actions">
                                                        <li>
                                                    <span title="" data-placement="top" data-toggle="tooltip" data-original-title="Favorite">
                                                        <i class="fa fa-heart-o"></i>
                                                    </span>
                                                        </li>
                                                        <li class="share-btn">
                                                            <div class="share_tooltip fade">
                                                                <a target="_blank" href="#"><i class="fa fa-facebook"></i></a>
                                                                <a target="_blank" href="#"><i class="fa fa-twitter"></i></a>
                                                                <a target="_blank" href="#"><i class="fa fa-google-plus"></i></a>
                                                                <a target="_blank" href="#"><i class="fa fa-pinterest"></i></a>
                                                            </div>
                                                            <span title="" data-placement="top" data-toggle="tooltip" data-original-title="share"><i class="fa fa-share-alt"></i></span>
                                                        </li>
                                                    </ul>
                                                </figure>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="widget widget-reviews">
                                <div class="widget-top">
                                    <h3 class="widget-title">Map</h3>
                                </div>
                                <div class="widget-body">
                                    <div id="map2" style="width: 100%;height:250px;"></div>
                                </div>
                            </div>
                        </aside>
                    </div>
                </div>
            </div>
        </section>
        <!--end detail content-->
    </div>
@endsection