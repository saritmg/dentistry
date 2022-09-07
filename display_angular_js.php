<?php

    include'header1.php';

?>

    <!-- page-header-start -->
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                    <div class="page-section">
                        <h1 class="page-title ">Angular &nbsp JS MySQL/JSON and Search Filters</h1>
                        <p>Search for dentist as per name!</p>
                        <!-- <a href="#" class="btn btn-primary">make an appointment</a> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- page-header-close -->
    <!-- treatment start -->
    <div class="space-medium">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
                    <div class="testimonial-content mb40">
                       <style>
                                table, th , td  {
                                  border: 3px solid grey;
                                  border-collapse: collapse;
                                  width: 700px;
                                  margin-left: 200px;
                                  padding-left: 20px;
                                  padding-right: 20px;
                                }
                                table tr:nth-child(odd) {
                                  background-color: #f1f1f1;
                                }
                                table tr:nth-child(even) {
                                  background-color: #ffffff;
                                }
                                </style>

                                        <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>
                                </head>

                                <body>
                                <h2>Data displayed Using Angular JS from Mysql</h2>
                                <p> It uses AngularJS to connect to MySQL data at dent_details.php.<br> This is output as JSON and then displayed using an AngularJS controller. <br>The results can be filtered by the entries in the search box. 
                                </p>

                                <div ng-app="myApp" ng-controller="dentCtrl" ng-init="display_data()"> 
                                Search:<input ng-model = "query" type="text">
                                        <button type="Submit"><i class="fa fa-search"></i></button>
                                <br />
                                <br />
                                <table>
                                    <tr>
                                        <th>Name</th>
                                        <th>Age</th>
                                        <th>Gender</th>
                                        <th>Dentist Type</th>
                                    </tr>
                                  <tr ng-repeat="dentist in dentists | filter:query">
                                    <td>{{ dentist.name }}</td>
                                    <td>{{ dentist.age }}</td>
                                    <td>{{ dentist.gender }}</td>
                                    <td>{{ dentist.dtype }}</td>
                                  </tr>
                                </table>

                                </div>

                                <script>
                                var app = angular.module('myApp', []);
                                app.controller('dentCtrl', function($scope, $http) {
                                  $scope.display_data=function(){

                                     $http.get("dent_details.php")

                                    .success(function(data) {
                                        $scope.dentists = data;
                                    });
                                }
                                })();
                                </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>
</html>

<?php
    include 'footer.php';
?>
