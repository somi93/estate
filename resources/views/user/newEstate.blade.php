@extends('layout')

@section('content')
    <div class="admin-content">
        <div class="admin-tables" id="admin-table-estate" ng-controller="estate" style="width: 60%;margin-left:20%;">
            <div id="map" style="width: 100%;height:400px;border:1px solid#666"></div>
            <table class="insert-table">
                <tr>
                    <th colspan="2">Add estate</th>
                </tr>
                <tr>
                    <td><label>Title</label></td>
                    <td><input class="form-input" type="text" ng-model="newEstate.title" /></td>
                </tr>
                <tr>
                    <td><label>Description</label></td>
                    <td><textarea class="form-input"ng-model="newEstate.description"></textarea></td>
                </tr>
                <tr>
                    <td><label>Price</label></td>
                    <td><input class="form-input" type="number" ng-model="newEstate.price" /></td>
                </tr>
                <tr>
                    <td><label>Area (km2)</label></td>
                    <td><input class="form-input" type="number" ng-model="newEstate.area" /></td>
                </tr>
                <tr>
                    <td><label>City</label></td>
                    <td>
                        <select ng-change="cityAreas(city.id)" ng-model="city.id" ng-options="city.id as city.name for city in cities | orderBy:'name'">
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label>Area</label></td>
                    <td>
                        <select ng-model="area.id" ng-change="areaStreets(area.id)" ng-options="area.id as area.name for area in areas | orderBy:'name'">
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label>Street</label></td>
                    <td>
                        <select ng-model="newEstate.street_id" ng-change="street(newEstate.street_id)" ng-options="street.id as street.name for street in streets | orderBy:'name'">
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label>Number</label></td>
                    <td>
                        <input ng-model="newEstate.number" type="number" id="nmbr"/>
                    </td>
                </tr>
                <tr>
                    <td><label>Equipment</label></td>
                    <td>
                        <label>Elevator</label>
                        <input type="checkbox" ng-model="newEstate.elevator"/>
                        <label>Internet</label>
                        <input type="checkbox" ng-model="newEstate.internet"/>
                        <label>Intercom</label>
                        <input type="checkbox" ng-model="newEstate.intercom"/>
                        <label>Fridge</label>
                        <input type="checkbox" ng-model="newEstate.fridge"/>
                        <label>Cameras</label>
                        <input type="checkbox" ng-model="newEstate.cameras"/>
                        <label>TV</label>
                        <input type="checkbox" ng-model="newEstate.tv"/>
                        <label>Parking</label>
                        <input type="checkbox" ng-model="newEstate.parking"/>
                        <label>Garage</label>
                        <input type="checkbox" ng-model="newEstate.garage"/>
                        <label>Climate</label>
                        <input type="checkbox" ng-model="newEstate.climate"/>
                    </td>
                </tr>
                <tr>
                    <td><label>Heating</label></td>
                    <td>
                        <label>Central Heating</label>
                        <input type="checkbox" ng-model="newEstate.central"/>
                        <label>Etage Heating</label>
                        <input type="checkbox" ng-model="newEstate.etage"/>
                        <label>TA Heating</label>
                        <input type="checkbox" ng-model="newEstate.ta"/>
                        <label>Floor Heating</label>
                        <input type="checkbox" ng-model="newEstate.floor"/>
                        <label>Current Heating</label>
                        <input type="checkbox" ng-model="newEstate.current"/>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <button class="button" ng-click="insertEstate()">Insert</button>
                    </td>
                </tr>
            </table>
        </div>
        <div class="clearfix"></div>
    </div>
@endsection