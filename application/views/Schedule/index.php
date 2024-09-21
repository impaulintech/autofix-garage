<div class="content-wrapper">
    <table class="table-list table table-striped table-bordered text-center" id="myTable">
        <thead style="background-color:red;" class="text-white">
            <tr>
                <th>
                    ID
                </th>
                <th>
                    First name
                </th>
                <th>
                  Middle name  
                </th>
                <th>
                    Last Name
                </th>
                <th>
                    Address
                </th>
                <th>
                    Contact
                </th>
                <th>
                    Email
                </th>
            </tr>
        </thead>

        <?php foreach($Schedule as $Schedule) : ?>
        <tbody>
            <tr>
                <td>
                    <?= $Schedule->Sch_id?>
                </td>
                <td>
                    <?= $Schedule->fname ?>
                </td>
                <td>
                    <?= $Schedule->mname ?>
                </td>

                <td>
                    <?= $Schedule->lname ?>
                </td>
                <td>
                    <?= $Schedule->address?>
                </td>
                <td>
                    <?= $Schedule->contact ?>
                </td>
                <td>
                    <?= $Schedule->email ?>
                </td>
                <td>
     <a href="<?= site_url('Schedule/show/'.$Schedule->sch_id) ?>"> <img src="<?=base_url('assets/images/edit.png')?>" style="width:15px;" alt="edit"> </a> 
    </td>
            </tr>
        </tbody>
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
                 <form action="<?=site_url('schedule/add')?>" method="post">
                     <div class="modal-body">
                         <div class="row">
                             <div class="col">

                                 <label for="ill_name">Full Name :</label>
                                 <input type="text" class="form-control" placeholder="Full Name" id="ill_name"
                                     name="ill_name" value="" required="">
                             </div>
                             <div class="col">

                                 <label for="contagious">Schedule For :</label>
                                 <input type="text" class="form-control" placeholder="Schedule For" id="contagious"
                                     name="contagious" value="">
                             </div>
                             <div class="col">

                                 <label for="danger_level">Contact Number :</label>
                                 <input type="text" class="form-control" placeholder="Contact Number" id="danger_level" name="danger_level"
                                     value="" required="">
                             </div>
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
</div>