@extends('layout')

@section('content')
    <div class="admin-content">
        <div class="admin-menu">

            <h2>Choose Table</h2>
            <div class="vertical-menu">
                <a href="#" data-table="nav" class="active admin-menu-tab">Navigation</a>
                <a href="#" data-table="city" class="admin-menu-tab">City</a>
                <a href="#" data-table="area" class="admin-menu-tab">Area</a>
                <a href="#" data-table="street" class="admin-menu-tab">Street</a>
                <a href="#" data-table="estate" class="admin-menu-tab">Estate</a>
            </div>
        </div>
        <div class="admin-tables" id="admin-table-nav" ng-controller="navigation">
            <h2>Navigation Table</h2>

            <table>
                <tr>
                    <th>Name</th>
                    <th>Link</th>
                    <th>Update/Delete</th>
                </tr>
                <tr ng-repeat="link in links">
                    <td>@{{ link.name  }}</td>
                    <td>/@{{ link.link  }}</td>
                    <td>
                        <button class="button" ng-click="showEdit(link.id)">Edit</button>
                        <button class="button" ng-click="confirmDelete(link.id)">Delete</button>
                    </td>
                </tr>
                <tr>
                    <td colspan="3"><button class="button" ng-click="shownavtable()">New Link</button></td>
                </tr>
            </table>
            <br/>
            <table class="hidden update-table">
                <tr>
                    <th>Name</th>
                    <th>Link</th>
                    <th>Update</th>
                </tr>
                <tr>
                    <td><input class="form-input" type="text" ng-model="singleLink.name" value="@{{ name }}" /></td>
                    <td><input class="form-input" type="text" ng-model="singleLink.link" value="@{{ link }}" /></td>
                    <td>
                        <button class="button" ng-click="update(id)">Update</button>
                    </td>
                </tr>
            </table>
            <br/>
            <table class="hidden insert-nav-table">
                <tr>
                    <th>Name</th>
                    <th>Link</th>
                    <th>Update</th>
                </tr>
                <tr>
                    <td><input class="form-input" type="text" ng-model="insertLink.name" /></td>
                    <td><input class="form-input" type="text" ng-model="insertLink.link" /></td>
                    <td>
                        <button class="button" ng-click="insert()">Insert</button>
                    </td>
                </tr>
            </table>
        </div>
        <div class="admin-tables hidden" id="admin-table-city" ng-controller="city">
            <h2>City Table</h2>

            <table>
                <tr>
                    <th>Name</th>
                    <th>Update/Delete</th>
                </tr>
                <tr ng-repeat="city in cities">
                    <td>@{{ city.name  }}</td>
                    <td>
                        <button class="button" ng-click="showEdit(city.id)">Edit</button>
                        <button class="button" ng-click="deleteCity(city.id)">Delete</button>
                    </td>
                </tr>
                <tr>
                    <td colspan="3"><button class="button" ng-click="showtable()">New City</button></td>
                </tr>
            </table>
            <br/>
            <table class="hidden update-table">
                <tr>
                    <th>Name</th>
                    <th>Update</th>
                </tr>
                <tr>
                    <td><input class="form-input" type="text" ng-model="singleCity.name" value="@{{ name }}" /></td>
                    <td>
                        <button class="button" ng-click="updateCity(id)">Update</button>
                    </td>
                </tr>
            </table>
            <br/>
            <table class="hidden insert-table">
                <tr>
                    <th>Name</th>
                    <th>Insert</th>
                </tr>
                <tr>
                    <td><input class="form-input" type="text" ng-model="newCity.name" /></td>
                    <td>
                        <button class="button" ng-click="insertCity()">Insert</button>
                    </td>
                </tr>
            </table>
        </div>
        <div class="admin-tables hidden" id="admin-table-area" ng-controller="area">
            <h2>Area Table</h2>

            <table>
                <tr>
                    <th>Name</th>
                    <th>City</th>
                    <th>Update/Delete</th>
                </tr>
                <tr ng-repeat="area in areas | limitTo:10">
                    <td>@{{ area.name  }}</td>
                    <td>@{{ area.city.name  }}</td>
                    <td>
                        <button class="button" ng-click="showEdit(area.id)">Edit</button>
                        <button class="button" ng-click="deleteArea(area.id)">Delete</button>
                    </td>
                </tr>
                <tr>
                    <td colspan="3"><button class="button" ng-click="showtable()">New Area</button></td>
                </tr>
            </table>
            <br/>
            <table class="hidden update-table">
                <tr>
                    <th>Name</th>
                    <th>City</th>
                    <th>Update</th>
                </tr>
                <tr>
                    <td><input class="form-input" type="text" ng-model="singleArea.name" value="@{{ name }}" /></td>
                    <td>
                        <select ng-model="singleArea.city">
                            <option ng-repeat="city in cities" value="@{{ city.id }}" ng-if="city.id==singleArea.city_id">@{{ city.name }}</option>
                            <option ng-repeat="city in cities" value="@{{ city.id }}" ng-if="city.id!=singleArea.city_id">@{{ city.name }}</option>
                        </select>
                    </td>
                    <td>
                        <button class="button" ng-click="updateArea(id)">Update</button>
                    </td>
                </tr>
            </table>
            <br/>
            <table class="hidden insert-table">
                <tr>
                    <th>Name</th>
                    <th>City</th>
                    <th>Insert</th>
                </tr>
                <tr>
                    <td><input class="form-input" type="text" ng-model="newArea.name" /></td>
                    <td>
                        <select ng-model="newArea.city">
                            <option ng-repeat="city in cities" value="@{{ city.id }}">@{{ city.name }}</option>
                        </select>
                    </td>
                    <td>
                        <button class="button" ng-click="insertArea()">Insert</button>
                    </td>
                </tr>
            </table>
        </div>
        <div class="admin-tables hidden" id="admin-table-street" ng-controller="street">
            <h2>Street Table</h2>

            <table>
                <tr>
                    <th>Name</th>
                    <th>Area</th>
                    <th>Update/Delete</th>
                </tr>
                <tr ng-repeat="street in streets | limitTo:10">
                    <td>@{{ street.name  }}</td>
                    <td>@{{ street.area.name  }}</td>
                    <td>
                        <button class="button" ng-click="showEdit(street.id)">Edit</button>
                        <button class="button" ng-click="deleteStreet(street.id)">Delete</button>
                    </td>
                </tr>
                <tr>
                    <td colspan="3"><button class="button" ng-click="showtable()">New Street</button></td>
                </tr>
            </table>
            <br/>

            <table class="hidden update-table">
                <tr>
                    <th>Name</th>
                    <th>City</th>
                    <th>Area</th>
                    <th>Update</th>
                </tr>
                <tr>
                    <td><input class="form-input" type="text" ng-model="singleStreet.name" value="@{{ name }}" /></td>
                    <td>
                        <select
                            ng-model="city.id"
                            ng-options="city.id as city.name for city in cities"
                            ng-change="cityAreas(city.id)">
                            <option>--</option>
                        </select>
                    </td>
                    <td>
                        <select ng-model="singleStreet.area">
                            <option ng-repeat="area in areas" value="@{{ area.id }}" ng-if="area.id==singleStreet.area_id">@{{ area.name }}</option>
                            <option ng-repeat="cityarea in cityareas" value="@{{ cityarea.id }}" ng-if="cityarea.id!=singleStreet.area_id">@{{ cityarea.name }}</option>
                        </select>
                    </td>
                    <td>
                        <button class="button" ng-click="updateStreet(id)">Update</button>
                    </td>
                </tr>
            </table>
            <br/>

            <table class="hidden insert-table">
                <tr>
                    <th>Name</th>
                    <th>City</th>
                    <th>Area</th>
                    <th>Insert</th>
                </tr>
                <tr>
                    <td><input class="form-input" type="text" ng-model="newStreet.name" /></td>
                    <td>
                        <select
                                ng-model="city.id"
                                ng-options="city.id as city.name for city in cities | orderBy:'name'"
                                ng-change="cityAreas(city.id)">
                            <option>--</option>
                        </select>
                    </td>
                    <td>
                        <select ng-model="newStreet.area"
                                ng-options="cityarea.id as cityarea.name for cityarea in cityareas | orderBy:'name'">
                                <option>--</option>
                        </select>
                    </td>
                    <td>
                        <button class="button" ng-click="insertStreet()">Insert</button>
                    </td>
                </tr>
            </table>
        </div>
        <div class="clearfix"></div>
    </div>
@endsection