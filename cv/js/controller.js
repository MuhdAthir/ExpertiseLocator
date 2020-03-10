'use strict';

var app = angular.module('myApp', []);

app.controller('myCtrl', function ($scope, $http, $window) {
	
	$scope.pd = {};
	
	$scope.getExpertProfile = function () {
		var url = "../rest/expertProfile.php?id="+$('#expertid').val();
		$http.get(url)
			.then(function (response) {
				console.log(response.data);
				$scope.pd = response.data.profile;
				$scope.skill = response.data.skill;
				$scope.arch = response.data.arch;
				$scope.edu = response.data.edu;
			});
	};

	$window.onload = function () {
		$scope.getExpertProfile();
	};
});
