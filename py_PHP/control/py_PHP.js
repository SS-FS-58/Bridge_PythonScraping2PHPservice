var app = angular.module('myApp', []);
app.controller('myCtrl', function($scope, $http) {
    
    $scope.temp = function () {
        setInterval($scope.getData, 300);
    }
    $scope.updateData = function($updateID, $updateStatus){
        $http({
            method: "POST",
            url: "model/py_PHP.php",
            params: {
                updateData : "updateData",
                updateID : $updateID,
                updateStatus : $updateStatus
            }
        })
    }
    $scope.getData = function(){
        $scope.index = 0;
        $http({
            method: "POST",
            url: "model/py_PHP.php",
            params: {
                getdata : "getdata"
            }
        }).then(
            function(resoponse){
                $scope.data = resoponse.data;
                $scope.dataCount = $scope.data.length;
                console.log($scope.data);
            }
        );
    }
    $scope.addData = function ($addID)
    {
        if($addID != undefined){
            $http({
                method: "POST",
                url: "model/py_PHP.php",
                params: {
                    add : "add",
                    loanID : $addID
                }
            });
        }
        
        
    }
    
});


