// public/js/services/services.js

var todoServices = angular.module('todoServices', ['ngResource']);

todoServices.factory('todosFactory', function($resource) {
	return $resource('/todos/:id', {id : '@id'}, {
		query: {method:'GET', params:{id:''}, isArray:true},
		save: {method:'POST'},
		update: {method:'PUT', params:{id:'@id'}},
		remove: {method:'DELETE', params:{id:'@id'}}
	});
});