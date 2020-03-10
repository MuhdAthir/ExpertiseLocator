'use strict';

var app = angular.module('myApp', []);

app.controller('myCtrl', function ($scope, $http, $window) {
	$scope.errormsj = "";
	$scope.opt = {};
	$scope.expert = {};

	$scope.getoptdata = function () {
		$http.get("../rest/getdpmtandAoe.php")
			.then(function (response) {
				$scope.opt = response.data;
				console.log($scope.opt);
			});
	};

	$scope.check = function () {
		if ($scope.expert.email !== undefined && $scope.expert.email !== '') {
			$('#email').removeClass('is-invalid');
			var url = "../rest/checkemail.php?email=" + $scope.expert.email;
			console.log(url);

			$http.get(url)
				.then(function (response) {
					if (response.data.res === true) {
						$('#email').addClass('is-valid');
						$('#fs').removeAttr('disabled');
					} else {
						$scope.errormsj = "The email already registered into the system";
						$('#email').removeClass('is-valid');
						$('#email').addClass('is-invalid');
						$('#fs').attr('disabled','true');
					}
				});

		} else {
			$scope.errormsj = "Either invalid email or the email is blank";
			$('#email').removeClass('is-valid');
			$('#email').addClass('is-invalid');
			$('#fs').attr('disabled','true');
		}
	};
	
	$scope.register = function () {
		console.log($scope.expert);
		$.post("../rest/regisExpert.php", $scope.expert,
			function (response) { // Required Callback Function
				alert(response);
				alert('Please sign-in using registered email');
				window.location.href = '../sign-in/';
			});
	};

	$window.onload = function () {
		$scope.getoptdata();
	};
});
