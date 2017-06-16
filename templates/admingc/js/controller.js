var app = angular.module("gamecentral", []);

app.filter('searchFor', function(){

	// All filters must return a function. The first parameter
	// is the data that is to be filtered, and the second is an
	// argument that may be passed with a colon (searchFor:searchString)

	return function(arr, searchString, fieldToCompare){
		if(!searchString){
			return arr;
		}
		var result = [];
		searchString = searchString.toLowerCase();
		// Using the forEach helper method to loop through the array
		angular.forEach(arr, function(item){
			if(item[fieldToCompare].toLowerCase().indexOf(searchString) !== -1){
				result.push(item);
			}
		});
		return result;
	};

});

app.controller("searchCTL", ['$scope','$http','$window',function ($scope,$http,$window) {
	$scope.registros = [];
	$scope.modelo = $window.modelo;
	$scope.campo = $window.campo;
	$scope.campos = $window.campos;
	//$scope.orden = $window.campo;
	$scope.orden = 'id';
	$scope.forma = '+';

    $scope.getRegistros = function(modelo){
        $http.get('/api/' + modelo).
            success(function(data, status, headers, config) {
                $scope.registros = data;
            }).
            error(function(data, status, headers, config) {
            
        });
    }
	$scope.getPropiedad = function(obj, prop) {
	    return obj[prop];
	}

	$scope.getRegistros($scope.modelo);
}]);
