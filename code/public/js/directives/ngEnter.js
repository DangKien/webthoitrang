ngApp.directive('ngEnter', function ()
{
    return function (scope, element, attrs)
    {
        element.bind("keydown keypress", function (event)
        {
            if (event.which === 13)
            {
                scope.$apply(function ()
                {
                    scope.$eval(attrs.ngEnter);
                });

                event.preventDefault();
            }
        });
    };
});

ngApp.directive('owlCarouselItem', ['$timeout', function($timeout) {
    return {
        restrict: 'A',
        link: function(scope, element) {
            if(scope.$last) {
                $timeout(function () {
                    $('.details-tab').owlCarousel({
                       nav: true,
                       items: 4,
                       loop: true,
                       margin: 10,
                       navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
                       responsive: {
                           0: {
                               items: 1
                           },
                           768: {
                               items: 2
                           },
                           1000: {
                               items: 4
                           }
                       }
                    });
               },50)
            }
        }
    };
}]);
