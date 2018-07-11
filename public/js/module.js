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

    $scope.event = {query: {}, data: {}, days: []};
    $scope.event.weekDays = [
        {label: 'Mon', isChecked: false},
        {label: 'Tue', isChecked: false},
        {label: 'Wed', isChecked: false},
        {label: 'Thu', isChecked: false},
        {label: 'Fri', isChecked: false},
        {label: 'Sat', isChecked: false},
        {label: 'Sun', isChecked: false}
    ];

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
    }


});
