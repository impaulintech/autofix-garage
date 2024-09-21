<div class="content-wrapper">
    <table class="table-list table table-striped table-bordered text-center" id="myTable">
        <thead style="background-color:black;" class="text-white">
            <tr>
                <th>
                    Employee ID
                </th>
                <th>
                    Created At
                </th>
                <th>
                    Created By
                </th>
                <th>
                    Updated At
                </th>
                <th>
                    Updated By
                </th>
                <th>
                    Deleted At
                </th>
                <th>
                    Deleted By
                </th>
                
            </tr>
        </thead>

        <?php foreach($logs as $logs) : ?>
        <tbody>
            <tr>
                <td>
                    <?= $logs->emp_id ?>
                </td>
                <td>
                    <?= $logs->createdAt ?>
                </td>
                <td>
                    <?= $logs->createdBy ?>
                </td>

                <td>
                    <?= $logs->updatedAt ?>
                </td>

                <td>
                    <?= $logs->updatedBy ?>
                </td>
                <td>
                    <?= $logs->deletedAt ?>
                </td>

                <td>
                    <?= $logs->deletedBy ?>
                </td>
                
            </tr>
        </tbody>
        <?php endforeach ?>
    </table>
</div>