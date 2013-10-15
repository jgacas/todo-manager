// public/js/services/services.js

var todoServices = angular.module('todoServices', ['ngResource']);

todoServices.factory('TodoRestClient', function($resource) {
		return $resource('http://todomanager.local/todos/:id', {id : '@id'}, {
			query: {method:'GET', params:{id:''}, isArray:true},
			post: {method:'POST'},
			update: {method:'PUT', params:{id:'id'}},
			remove: {method:'DELETE', params:{id:'id'}}
		});
	});