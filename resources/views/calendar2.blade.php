@extends('main')

@section('content')
    <nav class="navbar navbar-default navbar-fixed-top topbar">
        <div class="container-fluid">

            <div class="navbar-header">

                <a href="#" class="navbar-brand">
                </a>

                <p class="navbar-text">
                    <a href="#" class="sidebar-toggle">
                        <i class="fa fa-bars"></i>
                    </a>
                </p>

            </div>

            <div class="navbar-collapse collapse" id="navbar-collapse-main">

                <ul class="nav navbar-nav navbar-right">

                    <li>
                        <button class="navbar-btn">
                            <i class="fa fa-bell"></i>
                        </button>
                    </li>

                    <li class="dropdown">
                        <button class="navbar-btn" data-toggle="dropdown">

                        </button>
                        <ul class="dropdown-menu">
                            <li><a href="#">Account</a></li>
                            <li><a href="#">Dashboard</a></li>
                            <li class="nav-divider"></li>
                            <li><a href="#">Logout</a></li>
                        </ul>
                    </li>

                </ul>

            </div>
        </div>
    </nav>

    <article class="wrapper">

        <aside class="sidebar">
            <ul class="sidebar-nav">
                <li class="active"><a href="#dashboard" data-toggle="tab"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
                <li><a href="#configuration" data-toggle="tab"><span>Configuration</span></a></li>
                <li><a href="#users" data-toggle="tab"><span>Users</span></a></li>
                <li><a href="#mail" data-toggle="tab"> <span>Mail</span></a></li>
            </ul>
        </aside>

        <div class="row">
            <div class="col-lg-12" style="margin-top:70px">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4><strong>Calendar</strong></h4>
                    </div>
                    <div class="panel-body">
                        <div class="col-lg-4 col-md-4">
                            <div class="row">
                                <div class="form-group">
                                    <label>Event</label>
                                    <input type="text" class="form-control" ng-model="event.data.name">
                                </div>

                                <div class="form-group">
                                    <label>From</label>
                                    <input type="text" class="form-control" datepicker ng-model="event.query.from" ng-change="getMonthYear()"/>
                                </div>

                                <div class="form-group">
                                    <label>To</label>
                                    <input type="text" class="form-control" datepicker ng-model="event.query.to" ng-change="getMonthYear()"/>
                                </div>

                                <div class="form-group">
                                    <div class="checkbox pull-left" style="margin:0; margin-right: 7px" ng-repeat="day in event.weekDays">
                                        <label><input type="checkbox" ng-model="day.isChecked">@{{ day.label }}</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <button type="button" class="btn btn-primary" ng-click="save()">Save</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-8">

                            <div class="form-group">
                                <h3><strong>@{{ event.query.fromMonthYear }}</strong></h3>

                                <table class="table">
                                    <tbody>
                                    <tr ng-repeat="day in event.fromDays">
                                        <td ng-class="{success: isMatch(day)}">@{{ day.day }} @{{ day.dayName }}</td>
                                        <td ng-class="{success: isMatch(day)}">@{{ event.data.name }}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="form-group" ng-show="event.query.fromMonthYear != event.query.toMonthYear">
                                <h3><strong>@{{ event.query.toMonthYear }}</strong></h3>
                                <table class="table">
                                    <tbody>
                                    <tr ng-repeat="day in event.toDays">
                                        <td ng-class="{success: isMatch(day)}">@{{ day.day }} @{{ day.dayName }}</td>
                                        <td></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </article>
@endsection