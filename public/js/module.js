var app = angular.module('app', []);
app.run(function() { console.log('app run') });
app.directive('datepicker', function () {
    return {
        restrict: "A",
        link: function (scope, el, attr) {
            var dateToday = new Date();
            el.datepicker({
          //      minDate: dateToday,
                dateFormat: 'yy-mm-dd'
            });
        }
    };
});
app.controller('EventController', function($scope, $http) {

    $scope.event = {query: {}, data: {}, fromDays: [], toDays: []};
    $scope.event.weekDays = [
        {label: 'Mon', isChecked: false},
        {label: 'Tue', isChecked: false},
        {label: 'Wed', isChecked: false},
        {label: 'Thu', isChecked: false},
        {label: 'Fri', isChecked: false},
        {label: 'Sat', isChecked: false},
        {label: 'Sun', isChecked: false}
    ];

    // Returns an array of dates between the two dates
    var getDates = function(startDate, endDate) {
        var dates = [],
            currentDate = startDate,
            addDays = function(days) {
                var date = new Date(this.valueOf());
                date.setDate(date.getDate() + days);
                return date;
            };
        while (currentDate <= endDate) {
            var test = moment(currentDate).format('MM/DD/YYYY,ddd');
            dates.push(test);
            currentDate = addDays.call(currentDate, 1);
        }
        return dates;
    };

    init();

    function init()
    {
        console.log('EventController');
        console.log(moment("2012-02", "YYYY-MM").daysInMonth());
        console.log(moment("2012-01", "YYYY-MM").daysInMonth());
        console.log(moment("2012-12", "YYYY-MM").month());
    }

    $scope.getMonthYear = function()
    {

        var fromMonth = moment($scope.event.query.from, "YYYY-MM-DD").format('MMM YYYY');
        var fromMonthDays = moment($scope.event.query.from, "YYYY-MM").daysInMonth();

        var toMonth = moment($scope.event.query.to, "YYYY-MM-DD").format('MMM YYYY');
        var toMonthDays = moment($scope.event.query.to, "YYYY-MM").daysInMonth();

        $scope.event.query.fromMonthYear = fromMonth;
        $scope.event.query.toMonthYear = toMonth;

        var fromDays = [];
        for (var i=1; i<=fromMonthDays; i++)
        {
            var day = {day: i};

            mDate = moment($scope.event.query.from, "YYYY-MM-DD").format('YYYY-MM') + "-"  + i;

            day.dayName = moment(mDate, "YYYY-MM-DD").format('ddd');
            day.year = moment(mDate, "YYYY-MM-DD").format('YYYY');
            day.month = moment(mDate, "YYYY-MM-DD").format('MM');
            fromDays.push(day);
        }

        var toDays = [];
        for (var i=1; i<=toMonthDays; i++)
        {
            var day = {day: i};

            mDate = moment($scope.event.query.to, "YYYY-MM-DD").format('YYYY-MM') + "-"  + i;

            day.dayName = moment(mDate, "YYYY-MM-DD").format('ddd');
            toDays.push(day);
        }
        
        $scope.event.fromDays = fromDays;
        $scope.event.toDays = toDays;

        console.log($scope.event);

        return fromMonth;
    };

    $scope.save = function()
    {
        $scope.event.data.events = angular.copy([]);
        var d1 = $scope.event.query.from.split("-");
        var d2 = $scope.event.query.to.split("-")
        var toSaveEventWeeks = [];

        for (var i in $scope.event.weekDays)
        {
            var day = $scope.event.weekDays[i];

            if (day.isChecked) {
                toSaveEventWeeks.push(day.label);
            }
        }

        var dates = getDates(new Date(d1[0],d1[1] - 1,d1[2]), new Date(d2[0],d2[1] - 1,d2[2]));

        dates.forEach(function(date) {
            var weekDay = date.split(",")[1];
            var mDate = date.split(",")[0];

            console.log('to match weekday');
            console.log(weekDay);
            if (toSaveEventWeeks.includes(weekDay) > 0) {
                console.log('--------------day found match-------------');
                console.log(date)
                $scope.event.data.events.push({event_date: mDate});
            }
        });

        console.log($scope.event);
    }

    $scope.isMatch = function(matcher)
    {
       // console.log(matcher);

        for (var i in $scope.event.data.events)
        {
            var event = $scope.event.data.events[i];
            var d = matcher.day;
            if (matcher.day < 10) {
                d = '0' + d;
            }

            var matcherStr = matcher.month + '/' + d + '/' + matcher.year;

            console.log(matcherStr);
            console.log(event.event_date);
            if (event.event_date == matcherStr) {
                return true;
            }
        }
        return false;
    }
});
