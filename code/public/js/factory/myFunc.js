ngApp.factory('$myFunc', ['$rootScope', function ($rootScope) {
    var privateFunc = {
        calDate: function(date, format){
            var tmp;
            if(date || format){
                tmp = moment();
            }
            else{
                tmp = moment(date, format);
            }
            return tmp;
        }
    }
    var myFunc = {
        date: {
            getBeginOfWeek: function(date, format){
                var myDate = privateFunc.calDate(date, format);
                return myDate.startOf('week');
            },
            getEndOfWeek: function(date, format){
                var myDate = privateFunc.calDate(date, format);
                return myDate.endOf('week');
            },
            getBeginOfMonth: function(date, format){
                var myDate = privateFunc.calDate(date, format);
                return myDate.startOf('month');
            },
            getEndOfMonth: function(date, format){
                var myDate = privateFunc.calDate(date, format);
                return myDate.endOf('month');
            },
            getBeginOfYear: function(date, format){
                var myDate = privateFunc.calDate(date, format);
                return myDate.startOf('year');
            },
            getEndOfYear: function(date, format){
                var myDate = privateFunc.calDate(date, format);
                return myDate.endOf('year');
            },
        }
    };
    
    return myFunc;
}]);