<div class="content-wrapper">
    <table class="table-list table table-striped table-bordered text-center" id="myTable">
        <thead style="background-color:red;" class="text-white">
            <tr>
                <th>
                    ID
                </th>
                <th>
                    Fullname
                </th>
                <th>
                    Employee ID
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
                    Date Schedule
                </th>
                <th>
                    Date Release
                </th>
                <th>
                    Quantity
                </th>
                <th>
                    option
                </th>
            </tr>
        </thead>

        <?php foreach($health as $health) : ?>
        <tbody>
            <tr>
                <td>
                    <?= $health->health_id ?>
                </td>
                <td>
                    <?= $health->ill_name ?>
                </td>
                <td>
                    <?= $health->emp_id ?>
                </td>

                <td>
                    <?= $health->lname ?>
                </td>
                <td>
                    <?= $health->address ?>
                </td>
                <td>
                    <?= $health->contact ?>
                </td>
                <td>
                    <?= $health->date_declared ?>
                </td>
                <td>
                    <?= $health->date_cured ?>
                </td>
                <td>
                    <?= $health->is_sick ?>
                </td>
                <td>
     <a href="<?= site_url('health/show/'.$health->ill_id) ?>"> <img src="<?=base_url('assets/images/edit.png')?>" style="width:15px;" alt="edit"> </a> 
    </td>
            </tr>
        </tbody>
        <?php endforeach ?>
    </table>
</div>