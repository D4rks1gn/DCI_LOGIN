<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap link -->
	<link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    
    <!-- Bootstrap Java Script -->
    <script src="./assets/js/jquery.min.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script>

    <title>Document</title>
</head>
<body>
    <div class="row">
        <div class="col-md-2 col-sm-6 col-6 p-2">
            <input type="text" name="textName" id="textName" class="form-control" placeholder="Enter Name" />
        </div>
        <div class="col-md-2 col-sm-6 col-6 p-2">
            <input type="text" name="textName" id="textName" class="form-control" placeholder="Enter Name" />
        </div>
        <div class="col-md-2 col-sm-6 col-6 p-2">
            <input type="text" name="textName" id="textName" class="form-control" placeholder="Enter Name" />
        </div>
        <div class="col-md-2 col-sm-6 col-6 p-2">
            <input type="text" name="textName" id="textName" class="form-control" placeholder="Enter Name" />
        </div>
        <div class="col-md-2 col-sm-6 col-6 p-2">
            <input type="button" name="btnAdd" id="btnAdd" class="btn btn-primary" value="add">
        </div>
    </div>
    <div class="row pt-3">
        <div class="col-md-12 col-sm-12 col-12 p-2">
            <table class="table table-bordered table-hover table-stripped" id="tbData">
                <thead>
                    <tr>
                        <th>Sr No</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>D.O.B.</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</body>
</html>