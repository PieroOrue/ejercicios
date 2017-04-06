app.controller('formularioCtrl', ['$scope','$routeParams','$http', function($scope,$routeParams,$http){
	
	//var codigo = $routeParams.codigo;
	$scope.usuario = {};
	$scope.creando = true;

		$scope.guardarUsuario = function(){
			//console.log("Mensaje..");
			if ($scope.creando) {

				$http.post('php/servicios/usuario.crear.php', $scope.usuario).success(function(data){

				if( data.err === false ){

				//$scope.actualizado = true;

			};
				
			
			});

			}
		}
}]);