ngApp.factory('$socketIo', function($rootScope, $apply){
	var socket = io.connect('http://localhost:8888');
	var socketIo = {
	        on: function (eventName, callback) {
	            socket.on(eventName, function () {
	                var args = arguments;
	                $rootScope.$apply(function () {
	                    callback.apply(socket, args);
	                });
	            });
	        },
	        emit: function (eventName, data, callback) {
	            socket.emit(eventName, data, function () {
	                var args = arguments;
	                $rootScope.$apply(function () {
	                    if (callback) {
	                        callback.apply(socket, args);
	                    }
	                });
	            })
	        }
	    };
	return socketIo;
});