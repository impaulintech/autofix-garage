<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add</title>
</head>


<body>

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
                    <a href="<?=site_url('user')?>">
                        <div class="col-lg-4">
                            <button type="button" class="close" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </a>
                </div>
            </div>
            <form action="<?=site_url('user/edit')?>" method="post">
                <div class="modal-body">
                    <div class="row">
                        <div class="col">

                            <label for="Username">Username :</label>
                            <input type="text" class="form-control" placeholder="Username" id="Username" name="username"
                                value="<?=$user->username?>" required="">
                        </div>
                        <div class="col">

                            <label for="Password">Password :</label>
                            <input type="text" class="form-control" placeholder="Password" id="Password" name="password"
                                value="<?=$user->password?>">
                        </div>
                    </div>
                    <input type="hidden" name="user_id" value="<?=$user->user_id?>">
                    <div class="modal-footer">
                        <a href="<?=site_url('user')?>"><button type="button"
                                class="btn btn-secondary">Close</button></a>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
            </form>
        </div>





    </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <script>
    $(document).ready(function() {
        $("#BackdropEdit").modal('show');
    });
    </script>
</body>

</html>