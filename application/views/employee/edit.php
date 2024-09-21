<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add</title>
    <link rel="stylesheet" href="<?=base_url('assets/css/bootstrap.css')?>">
</head>
<body>
    <div class="content-wrapper">
        <form action="<?=site_url('employee/edit')?>" method="post">
            <div class="modal fade" id="BackdropEdit" data-backdrop="static" data-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <div class="col-lg-4">

                            </div>
                            <div class="col-lg-4">
                                <h5 class="modal-title col-12 text-center" id="staticBackdropLabel">Update
                                </h5>
                            </div>
                            <div class="col-lg-4">
                                <a href="<?=site_url('employee')?>"><button type="button" class="close"
                                        aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </a>
                            </div>
                        </div>

                        <div class="modal-body">
                            <form action="<?=site_url('employee/edit')?>" method="post">
                                <label for="role_id">Select Role :</label>
                                <select class="form-control" name="role_id" id="role_id" required="">
                                    <option value="<?= $employee->role_id ?>">Select Role</option>
                                    <option value="4">IT Admin</option>
                                    <option value="3">Admin</option>
                                    <option value="2">HR</option>
                                    <option value="1">Employee</option>
                                </select>
                                <div class="row">
                                    <div class="col">

                                        <label for="fname">First Name :</label>
                                        <input type="text" class="form-control" placeholder="First name" id="fname"
                                            name="fname" value="<?= $employee->fname ?>" required="">
                                    </div>
                                    <div class="col">

                                        <label for="mname">Middle Name :</label>
                                        <input type="text" class="form-control" placeholder="Middle name" id="mname"
                                            name="mname" value="<?= $employee->mname ?>">
                                    </div>
                                    <div class="col">

                                        <label for="lname">Last Name :</label>
                                        <input type="text" class="form-control" placeholder="Last name" id="lname"
                                            name="lname" value="<?= $employee->lname ?>" required="">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">

                                        <label for="contact">Mobile number :</label>
                                        <input type="text" class="form-control" placeholder="Mobile Number" id="contact"
                                            name="contact" value="<?= $employee->contact ?>" required="">
                                    </div>
                                    <div class="col">

                                        <label for="contact">Email :</label>
                                        <input type="text" class="form-control" placeholder="Email" id="email"
                                            name="email" value="<?= $employee->email ?>" required="">
                                    </div>
                                </div>

                                <div class="col">

                                    <label for="address">Address :</label>
                                    <input type="text" class="form-control" placeholder="Address" id="address"
                                        name="address" value="<?= $employee->address ?>" required="">
                                </div>
                                <input type="hidden" name="emp_id" value="<?= $employee->emp_id ?>">
                        </div>

                        <div class="modal-footer">
                            <a href="<?=site_url('employee')?>"><button type="button"
                                    class="btn btn-secondary">Close</button></a>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>

                    </div>
                </div>
        </form>

        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        <script src="<?=base_url('assets/js/bootstrap.min.js')?>"></script>
        <script src="<?=base_url('assets/js/popper.js')?>"></script>

        <script>
        $(document).ready(function() {
            $("#BackdropEdit").modal('show');
        });
        </script>
</body>

</html>