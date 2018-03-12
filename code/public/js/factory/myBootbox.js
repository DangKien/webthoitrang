ngApp.factory('$myBootbox', ['$rootScope', function ($rootScope) {
        var myBootbox = {
            confirm: function(message, callBack){
                callBack = callBack || function(){};
                bootbox.confirm({ 
                    message: message, 
                    callback: callBack
                });
            },
            alert: function(message, callBack){
                callBack = callBack || function(){};
                bootbox.confirm({
                    message: message, 
                    callback: callBack
                });
            }
        };
        
        return myBootbox;
}]);