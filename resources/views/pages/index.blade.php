@extends('layout')

@section('content')
    <section class="hero">
        <section class="caption">
            <h2 class="caption">Find You Dream Home</h2>
            <h3 class="properties">Appartements - Houses - Mansions</h3>
        </section>
        <div class="clearfix"></div>
    </section><!--  end hero section  -->
    <div class="clearfix"></div>

    <section class="search">
        <div class="wrapper">
            <form action="#" method="post">
                <input type="text" id="search" name="search" placeholder="What are you looking for?"  autocomplete="off"/>
                <input type="submit" id="submit_search" name="submit_search"/>
            </form>
            <a href="#" class="advanced_search_icon" id="advanced_search_btn"></a>
        </div>

        <div class="advanced_search">
            <div class="wrapper">
                <span class="arrow"></span>
                <form action="#" method="post">
                    <div class="search_fields">
                        <input type="text" class="float" id="check_in_date" name="check_in_date" placeholder="Check In Date"  autocomplete="off">

                        <hr class="field_sep float"/>

                        <input type="text" class="float" id="check_out_date" name="check_out_date" placeholder="Check Out Date"  autocomplete="off">
                    </div>
                    <div class="search_fields">
                        <input type="text" class="float" id="min_price" name="min_price" placeholder="Min. Price"  autocomplete="off">

                        <hr class="field_sep float"/>

                        <input type="text" class="float" id="max_price" name="max_price" placeholder="Max. price"  autocomplete="off">
                    </div>
                    <input type="text" id="keywords" name="keywords" placeholder="Keywords"  autocomplete="off">
                    <input type="submit" id="submit_search" name="submit_search"/>
                </form>
            </div>
        </div><!--  end advanced search section  -->
    </section><!--  end search section  -->


    <section class="listings">
        <div class="wrapper">
            <ul class="properties_list" ng-controller="estate">
                <li ng-repeat="estate in estates | limitTo : 6">
                    <a href="#">
                        <img src="{{ asset('img/property_1.jpg') }}" alt="" title="" class="property_img"/>
                    </a>
                    <span class="price">$ @{{ estate.price }}</span>
                    <div class="property_details">
                        <h1>
                            <a href="#">@{{ estate.title }}</a>
                        </h1>
                        <h2>2 kitchens, 2 bed, 2 bath... <span class="property_size">(@{{ estate.area }}ftsq)</span></h2>
                    </div>
                </li>
            </ul>
            <div class="more_listing">
                <a href="#" class="more_listing_btn">View More Listings</a>
            </div>
        </div>
    </section>	<!--  end listing section  -->

@endsection