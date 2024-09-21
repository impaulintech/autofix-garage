<div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>150</h3>

                                    <p>New Orders</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                                <a href="#" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>53<sup style="font-size: 20px">%</sup></h3>

                                    <p>Bounce Rate</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>
                                <a href="#" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>44</h3>

                                    <p>User Registrations</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person-add"></i>
                                </div>
                                <a href="#" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>65</h3>

                                    <p>Unique Visitors</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-pie-graph"></i>
                                </div>
                                <a href="#" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                    </div>
                    <!-- Main row -->
                    <div class="row">

                    </div>
                    Sick Employees
                    <table class="table-list table table-striped table-bordered text-center" id="myTable">
         <thead style="background-color:black;" class="text-white">
             <tr>
                 <th>
                     Employee ID
                 </th>
                 <th>
                     Illness
                 </th>
                 <th>
                     Last Name
                 </th>
                 <th>
                     First Name
                 </th>
                 <th>
                     Middle Name
                 </th>
                 <th>
                     Address
                 </th>
                 <th>
                     Contact
                 </th>
                 <th>
                     Date Declared
                 </th>
                 <th>
                    Option
                </th>

             </tr>
         </thead>

         <?php foreach($sicks as $sicks) : ?>
         <tbody>
             <tr>
                 <td>
                     <?= $sicks->emp_id ?>
                 </td>
                 <td>
                     <?= $sicks->ill_name ?>
                 </td>
                 <td>
                     <?= $sicks->lname ?>
                 </td>

                 <td>
                     <?= $sicks->fname ?>
                 </td>

                 <td>
                     <?= $sicks->mname ?>
                 </td>
                 <td>
                     <?= $sicks->address ?>
                 </td>

                 <td>
                     <?= $sicks->contact ?>
                 </td>
                 <td>
                     <?= $sicks->date_declared ?>
                 </td>
             </tr>
         </tbody>
         <?php endforeach ?>
     </table>

                </div>
            </section>
        </div>