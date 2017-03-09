@extends('layout')

@section('content')
    <div class="filters-box">
        <div class="filters">
            <div class="price-box">
                <label>Price:</label><br/>
                <input type="number" class="form form-input" ng-model="minPrice">
                <input type="number" class="form form-input" ng-model="maxPrice">
            </div>

            <div class="size-box">
                <label>Size:</label><br/>
                <input type="number" class="form form-input" ng-model="minSize">
                <input type="number" class="form form-input" ng-model="maxSize">
            </div>
            <div class="heating-box">
                <button class="btn btn-search btn-ddl">
                    <span>Heating</span> <i class="fa fa-sort-desc" aria-hidden="true"></i>
                </button>
                <div class="dropdown-menu hidden">
                    <ul>
                        <li><input type="checkbox" ng-model="centralh" /><label>Central Heating</label></li>
                        <li><input type="checkbox" ng-model="tah" /><label>TA</label></li>
                        <li><input type="checkbox" ng-model="etagh" /><label>Etag Heating</label></li>
                        <li><input type="checkbox" ng-model="floorh" /><label>Floor Heating</label></li>
                        <li><input type="checkbox" ng-model="currenth" /><label>Current Heating</label></li>
                    </ul>
                </div>
            </div>
            <div class="heating-box">
                <button class="btn btn-search btn-ddl">
                    <span>Furnishment</span> <i class="fa fa-sort-desc" aria-hidden="true"></i>
                </button>
                <div class="dropdown-menu hidden">
                    <ul>
                        <li><input type="checkbox" ng-model="furnished" /><label>Furnished</label></li>
                        <li><input type="checkbox" ng-model="halffurnished" /><label>Half Furnished</label></li>
                        <li><input type="checkbox" ng-model="unfurnished" /><label>Unfurnished</label></li>
                    </ul>
                </div>
            </div>
            <div class="facilities-box">
                <button class="btn btn-search btn-ddl">
                    <span>Facilities</span> <i class="fa fa-sort-desc" aria-hidden="true"></i>
                </button>
                <div class="dropdown-menu hidden">
                    <ul>
                        <li><input type="checkbox" ng-model="elevator" /><label>Elevator</label></li>
                        <li><input type="checkbox" ng-model="internet" /><label>Internet</label></li>
                        <li><input type="checkbox" ng-model="intercom" /><label>Intercom</label></li>
                        <li><input type="checkbox" ng-model="cameras" /><label>Cameras</label></li>
                        <li><input type="checkbox" ng-model="climate" /><label>Climate</label></li>
                        <li><input type="checkbox" ng-model="fridge" /><label>Fridge</label></li>
                        <li><input type="checkbox" ng-model="tv" /><label>TV</label></li>
                        <li><input type="checkbox" ng-model="garage" /><label>Garage</label></li>
                        <li><input type="checkbox" ng-model="parking" /><label>Parking</label></li>
                    </ul>
                </div>
            </div>
            <div class="submit-box">
                <button class="btn btn-search" id="filter-estates">Search</button>
            </div>
        </div>
    </div>
    <div style="padding:0px 0px;" ng-controller="map">
        <div id="map" style="width: 100%;height:618px;"></div>
    </div>
@endsection