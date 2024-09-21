<div class="content-wrapper">
    <table class="table-list table table-striped table-bordered text-center" id="myTable">
        <thead style="background-color:red;" class="text-white">
            <tr>
                <th>
                    User ID
                </th>
                <th>
                    Username
                </th>
                <th>
                    Password
                </th>
                <th>
                    Customer ID
                </th>
                <th>
                    Last Name
                </th>
                <th>
                    First Name
                </th>
                <th>
                    Option
                </th>
            </tr>
        </thead>

        <?php foreach($users as $user) : ?>
        <tr>
            <td>
                <?=$user->user_id?>
            </td>
            <td>
                <?=$user->username?>
            </td>
            <td>
                <?=$user->password?>
            </td>
            <td>
                <?=$user->emp_id?>
            </td>
            <td>
                <?=$user->lname?>
            </td>
            <td>
                <?=$user->fname?>
            </td>
            <td>
                <a href="<?= site_url('user/show/'. $user->user_id) ?>"><img src="<?=base_url('assets/images/edit.png')?>"
                        style="width:15px;" alt="edit"></a>
                <a href="<?= site_url('user/delete/'. $user->user_id) ?>"><img
                        src="<?=base_url('assets/images/delete.png')?>" style="width:15px;" alt="delete"></a>

            </td>
        </tr>
        <?php endforeach ?>
    </table>

    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#BackdropAdd">
        Add New
    </button>

    <div class="modal fade" id="BackdropAdd" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="col-lg-4">

                    </div>
                    <div class="col-lg-4">
                        <h5 class="modal-title col-12 text-center" id="staticBackdropLabel">Add
                        </h5>
                    </div>
                    <div class="col-lg-4">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
                <form action="<?=site_url('user/add')?>" method="post">
                    <div class="modal-body">

                        <div class="col">

                            <label for="Username">Employee ID :</label>
                            <input type="text" class="form-control" placeholder="Employee ID" id="emp_id" name="emp_id"
                                value="" required="">
                        </div>
                        <div class="row">

                            <div class="col">

                                <label for="Username">Username :</label>
                                <input type="text" class="form-control" placeholder="Username" id="Username"
                                    name="username" value="" required="">
                            </div>
                            <div class="col">

                                <label for="Password">Password :</label>
                                <input type="text" class="form-control" placeholder="Password" id="Password"
                                    name="password" value="">
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="col-12 col-lg-2">

</div>
</div>
</div>
</div>