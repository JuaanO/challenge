var app = angular.module('crudApp', ['datatables']);
app.controller('crudController', function($scope, $http) {

    $scope.success = false;

    $scope.error = false;

    $scope.fetchData = function() {
        $http.get('fetch_data.php').success(function(data) {
            $scope.namesData = data;
        });
    };

    $scope.openModal = function() {
        var modal_popup = angular.element('#crudmodal');
        modal_popup.modal('show');
    };

    $scope.closeModal = function() {
        var modal_popup = angular.element('#crudmodal');
        modal_popup.modal('hide');
    };

    $scope.addData = function() {
        $scope.modalTitleCrear = 'Crear Nuevo Empleado';
        $scope.submit_button = 'Insert';
        $scope.openModal();
    };

    $scope.submitForm = function() {
        $http({
            method: "POST",
            url: "Controller/insert.php",
            data: {
                'first_name': $scope.first_name,
                'last_name': $scope.last_name,
                'identification': $scope.identification,
                'estado': $scope.estado,
                'birthDate': $scope.birthDate,
                'email': $scope.email,
                'observation': $scope.observation,
                'DateEntry': $scope.DateEntry,
                'position': $scope.position,
                'departament': $scope.departament,
                'salary': $scope.salary,
                'parcial': $scope.parcial,
                'action': $scope.submit_button,
                'id': $scope.hidden_id
            }
        }).success(function(data) {
            if (data.error != '') {
                $scope.success = false;
                $scope.error = true;
                $scope.errorMessage = data.error;
            } else {
                $scope.success = true;
                $scope.error = false;
                $scope.successMessage = data.message;
                $scope.form_data = {};
                $scope.closeModal();
                $scope.fetchData();
            }
        });
    };

    $scope.fetchSingleData = function(id) {
        $http({
            method: "POST",
            url: "Controller/insert.php",
            data: { 'id': id, 'action': 'fetch_single_data' }
        }).success(function(data) {
            $scope.first_name = data.first_name;
            $scope.last_name = data.last_name;
            $scope.identification = data.identification;
            $scope.birthDate = data.birthDate;
            $scope.estado = data.estado;
            $scope.email = data.email;
            $scope.observation = data.observation;
            $scope.DateEntry = data.DateEntry;
            $scope.position = data.position;
            $scope.departament = data.departament;
            $scope.salary = data.salary;
            $scope.parcial = data.parcial;
            $scope.hidden_id = id;
            $scope.modalTitle = 'Edit Data';
            $scope.submit_button = 'Edit';
            $scope.openModal();
        });
    };


    $scope.fetchSingleDataProvincia = function(id) {
        $http({
            method: "POST",
            url: "Controller/insert.php",
            data: { 'id': id, 'action': 'fetch_single_data' }
        }).success(function(data) {
            $scope.first_name = data.first_name;
            $scope.last_name = data.last_name;
            $scope.identification = data.identification;
            $scope.birthDate = data.birthDate;
            $scope.estado = data.estado;
            $scope.email = data.email;
            $scope.observation = data.observation;
            $scope.hidden_id = id;
            $scope.modalTitle = 'Edit Data';
            $scope.submit_button = 'Edit';
            $scope.openModal();
        });
    };
    $scope.clicked = function() {
        window.location = ("Reporte.html");
    }
    $scope.clickedSalir = function() {
        window.location = ("./index.html");
    }

    $scope.deleteData = function(id) {
        if (confirm("Are you sure you want to remove it?")) {
            $http({
                method: "POST",
                url: "Controller/insert.php",
                data: { 'id': id, 'action': 'Delete' }
            }).success(function(data) {
                $scope.success = true;
                $scope.error = false;
                $scope.successMessage = data.message;
                $scope.fetchData();
            });
        }
    };

});