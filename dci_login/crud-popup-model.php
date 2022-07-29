<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- Insert Pop-up Modal = WORKED -->
    <div class="modal fade" id="popupAddRow" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="crud-insert.php" method="post" class="form">
                <div class="modal-body">
                <div class="row justify-content-md-center">
                    <div class="form-group col-lg-6">
                    <label for="prof">User Name</label>
                    <input type="text" class="form-control" id="prof" name="prof" placeholder="Username" required>
                    </div>
                    <div class="form-group col-lg-6">
                    <label for="fnm">First Name</label>
                    <input type="text" class="form-control" id="fnm" name="fnm" placeholder="First Name"  required>
                    </div>
                    <div class="form-group col-lg-6">
                    <label for="lnm">Last Name</label>
                    <input type="text" class="form-control" id="lnm" name="lnm" placeholder="Last Name"  required>
                    </div>
                    <div class="form-group col-lg-6">
                    <label for="dob">Date of Birth</label>
                    <input type="date" class="form-control" id="dob" name="dob" placeholder="Date of Birth"  required>
                    </div>
                    <div class="form-group col-lg-6">
                    <label for="gender">Gender</label>
                    <select class="form-control" name="gender" id="gender">
                        <option value="0" required>Male</option>
                        <option value="1" required>Female</option>
                    </select>
                    </div>
                    <div class="form-group col-lg-6">
                    <label for="email">Email id</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Enter email id"  required>
                    </div>
                </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="addRow">Save</button>
                </div>
            </form>
            </div>
        </div>
    </div>
    
    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteRow" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Row</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>


            <?php $row = mysqli_fetch_array($result);
            ?>


            <form action="crud-insert.php?deleteRow=<? echo $row[0] ?>" method="post">
                <input type="hidden" name="deleteRow">
                <div class="modal-body">
                Do you want to delete a row ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <a href="crud-insert.php" class="btn btn-danger">Delete</a>
                </div>
            </form>
            </div>
        </div>
    </div>

    <!-- Update Pop-up Modal -->
    <div class="modal fade" id="updateRow" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="crud-insert.php?editRow=" method="post" class="form">
                <div class="modal-body">
                <div class="row justify-content-md-center">
                    <div class="form-group col-lg-6">
                    <label for="prof">User Name</label>
                    <input type="text" class="form-control" id="prof" name="prof" placeholder="Username" required>
                    </div>
                    <div class="form-group col-lg-6">
                    <label for="fnm">First Name</label>
                    <input type="text" class="form-control" id="fnm" name="fnm" placeholder="First Name"  required>
                    </div>
                    <div class="form-group col-lg-6">
                    <label for="lnm">Last Name</label>
                    <input type="text" class="form-control" id="lnm" name="lnm" placeholder="Last Name"  required>
                    </div>
                    <div class="form-group col-lg-6">
                    <label for="dob">Date of Birth</label>
                    <input type="date" class="form-control" id="dob" name="dob" required>
                    </div>
                    <div class="form-group col-lg-6">
                    <label for="gender">Gender</label>
                    <select class="form-control" name="gender" id="gender">
                        <option value="0" required>Male</option>
                        <option value="1" required>Female</option>
                    </select>
                    </div>
                    <div class="form-group col-lg-6">
                    <label for="email">Email id</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Enter email id"  required>
                    </div>
                </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="editRow">Save changes</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</body>
</html>l