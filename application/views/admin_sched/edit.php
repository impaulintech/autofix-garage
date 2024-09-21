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
                    <a href="<?=site_url('admin_sched')?>">
                        <div class="col-lg-4">
                            <button type="button" class="close" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </a>
                </div>
            </div>
            <form action="<?=site_url('admin_sched/edit')?>" method="post">
                <div class="modal-body">
                 
                    <div class="row">
                        <div class="col">

                            <label for="ill_name">Full name :</label>
                            <input type="text" class="form-control" placeholder="ill_name" id="ill_name" name="ill_name"
                                value="<?=$illness->ill_name?>" required="">
                        </div>
                        <div class="col">

                            <label for="contagious">Schedule for :</label>
                            <input type="text" class="form-control" placeholder="contagious" id="contagious" name="contagious"
                                value="<?=$illness->contagious?>">
                        </div>
                        <div class="col">

                            <label for="danger_level">Contact Number :</label>
                            <input type="text" class="form-control" placeholder="Danger Level" id="danger_level" name="danger_level"
                                value="<?=$illness->danger_level?>">
                        </div>
                    </div>
                    <input type="hidden" name="ill_id" value="<?=$illness->ill_id?>">
                    <div class="modal-footer">
                        <a href="<?=site_url('illness')?>"><button type="button"
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