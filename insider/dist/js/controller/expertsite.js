'use strict';

var app = angular.module('myApp', []);

app.controller('myCtrl', function ($scope, $http, $window) {

	$scope.addSkill = function () {
		$.post("../../../rest/expert_add.php", //Required URL of the page on server
			{ // Data Sending With Request To Server
				id:  $('#expertid').val(),
				skill: $scope.newSkill.skill,
				prog: $scope.newSkill.progress,
			},
			function (response) { // Required Callback Function
				$('#exampleModalCenter').modal('hide');
				window.location.href = window.location.href;
			});
	};	
	
	$scope.addArch = function () {
		$.post("../../../rest/expert_add.php", //Required URL of the page on server
			{ // Data Sending With Request To Server
				id:  $('#expertid').val(),
				achieve: $scope.newArch.achieve,
				desc: $scope.newArch.desc,
				year: $scope.newArch.year,
			},
			function (response) { // Required Callback Function
				$('#exampleModalCenter').modal('hide');
				window.location.href = window.location.href;
			});
	};	
	
	$scope.addEdu = function () {
		$.post("../../../rest/expert_add.php", //Required URL of the page on server
			{ // Data Sending With Request To Server
				id:  $('#expertid').val(),
				edu: $scope.newEdu.edu,
				desc: $scope.newEdu.desc,
				level: $scope.newEdu.level,
				start: $('#start').val(),
				end: $('#end').val(),
			},
			function (response) { // Required Callback Function
				$('#exampleModalCenter').modal('hide');
				window.location.href = window.location.href;
			});
	};
});
