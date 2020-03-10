'use strict';

var app = angular.module('myApp', []);

app.controller('myCtrl', function ($scope, $http, $window) {
	$scope.searchopt = "1";
	$scope.allExpert = {};
	$scope.showResult = false;
	$scope.show = true;

	$scope.getAllExpert = function () {
		$http.get("rest/getExpert.php")
			.then(function (response) {
				$scope.allExpert = response.data;
				console.log($scope.allExpert);
			});
	};

	$scope.getoptdata = function () {
		$http.get("rest/getdpmtandAoe.php")
			.then(function (response) {
				$scope.opt = response.data;
				console.log($scope.opt);
			});
	};

	$scope.search = function () {
		console.log('opt:',$scope.searchopt);
		$scope.result = [];
		switch ($scope.searchopt) {
			case '1':
				searchbyword();
				break;
			case '2':
				searchbylevel();
				break;
			case '3':
				searchbyposition();
				break;
			case '4':
				searchbyyear();
				break;
			case '5':
				searchbydept();
				break;
//			case 6:
//				day = "Saturday";
		}
	};

	$window.onload = function () {
		$scope.getoptdata();
		$scope.getAllExpert();
	};
	
	$scope.reset = function () {
		$scope.showResult = false;
		$scope.result = [];
	};

	function searchbyword() {
		$scope.showResult = true;
		var param = $('#expname').val();
		$scope.allExpert.forEach((row) => {
			if (row.name.toLowerCase().indexOf(param.toLowerCase()) >= 0) {
				$scope.result.push(row);
			}
		});
	}	
	
	function searchbylevel() {
		alert('Opssie, the function currently in ICU');
//		var param = $('#explevel').val();
//		$scope.allExpert.forEach((row) => {
//			if (row.name.toLowerCase().indexOf(param.toLowerCase()) >= 0) {
//				$scope.result.push(row);
//			}
//		});
	}	
	
	function searchbyposition() {
		$scope.showResult = true;
		var param = $('#expposition').val();
		$scope.allExpert.forEach((row) => {
			if (row.position == param) {
				$scope.result.push(row);
			}
		});
	}
	
	function searchbyyear() {
		$scope.showResult = true;
		var param = $('#expyear').val();
		$scope.allExpert.forEach((row) => {
			if (row.yearofexp == param) {
				$scope.result.push(row);
			}
		});
	}
	
	function searchbydept() {
		$scope.showResult = true;
		var param = $('#expdept').val();
		$scope.allExpert.forEach((row) => {
			if (row.department_id == param) {
				$scope.result.push(row);
			}
		});
	}
});
