'use strict';

var app = angular.module('myApp', []);

app.controller('myCtrl', function ($scope, $http, $window) {

	$scope.addDepartment = function () {
		$.post("../../rest/admin_add.php", //Required URL of the page on server
			{ // Data Sending With Request To Server
				department: 'true',
				name: $("#depart").val(),
			},
			function (response) { // Required Callback Function
				$('#exampleModalCenter').modal('hide');
				window.location.href = window.location.href;
			});
	};
	
	$scope.addAOE = function () {
		$.post("../../rest/admin_add.php", //Required URL of the page on server
			{ // Data Sending With Request To Server
				aoe: 'true',
				name: $("#aoe").val(),
			},
			function (response) { // Required Callback Function
				$('#exampleModalCenter').modal('hide');
				window.location.href = window.location.href;
			});
	};
});
