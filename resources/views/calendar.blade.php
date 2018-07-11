@extends('main')

@section('content')
    <h3>CALENDAR</h3>
    <hr>
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
        <div class="checkbox" ng-repeat="day in event.weekDays">
            <label><input type="checkbox" ng-model="day.isChecked">@{{ day.label }}</label>
        </div>
        <button type="button" class="btn btn-primary" ng-click="save()">Save</button>
    </div>

    <div class="form-group">
        <h4>@{{ event.query.fromMonthYear }}</h4>

        <table class="table">
            <tbody>
                <tr ng-repeat="day in event.fromDays">
                    <td ng-class="{success: isMatch(day)}">@{{ day.day }} @{{ day.dayName }}</td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="form-group" ng-if="event.query.fromMonthYear != event.query.toMonthYear">
        <h4>@{{ event.query.toMonthYear }}</h4>

        <table class="table">
            <tbody>
            <tr ng-repeat="day in event.toDays">
                <td>@{{ day.day }} @{{ day.dayName }}</td>
                <td></td>
            </tr>
            </tbody>
        </table>
    </div>

    <div style="word-wrap: break-word;">

            @{{ event }}

    </div>
@endsection