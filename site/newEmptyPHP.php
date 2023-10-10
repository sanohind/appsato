<!--                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title">List Data Period</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                    title="Collapse">
                                <i class="fa fa-minus"></i></button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                                <i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <table id="tbPrd" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Period ID.</th>
                                    <th>Tanggal Pelaksanaan</th>
                                    <th>Deskripsi</th>
                                    <th>Status</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody id="showData">
                                <?php
                                $data = $prd->getDataPeriod();
                                foreach ($data as $row) {
                                    ?>
                                    <tr>
                                        <td><?= $row->prd_id ?></td>
                                        <td><?= $row->prd_start ?> s/d <?= $row->prd_end ?></td>
                                        <td><?= $row->prd_desc ?></td>
                                        <td><?php
                            if ($row->prd_status == "O") {
                                echo 'On Progress';
                            } else {
                                echo 'Finish';
                            }
                                    ?></td>
                                        <td><?php
                                    if ($row->prd_status == "O") {
                                        ?>
                                                <a href="#" onclick="confirm_modal('periodfinish.php?Rid=<?= $row->prd_id ?>');"><i class="fa fa-check-circle danger"></i></a>
                                                <?php
                                            } else {
                                                echo '---';
                                            }
                                            ?>

                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>

                </div>-->
                                    
                                    
                                    <div class="box box-info">
                        <div class="box-header">
                            <h3 class="box-title">List Data User</h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                        title="Collapse">
                                    <i class="fa fa-minus"></i></button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                                    <i class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <div class="box-body">
                            <table id="tbPrd" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>User ID.</th>
                                        <th>User Name</th>
                                        <th>Departemen</th>
                                        <th>Level</th>
                                        <th>Remark</th>
                                        <th>Tgl. Register</th>
                                        <th>Terakhir Update</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody id="showData">
                                    <?php
                                    $data = $user->getDataUser();
                                    foreach ($data as $row) {
                                        ?>
                                        <tr>
                                            <td><?= $row->user_id ?></td>
                                            <td><?= $row->user_name ?></td>
                                            <td><?= $row->user_dept ?></td>
                                            <td><?= $row->user_right ?></td>
                                            <td><?= $row->user_remark ?></td>
                                            <td><?= $row->user_created ?></td>
                                            <td><?= $row->user_edited ?></td>
                                            <td>Opsi</td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>

                    </div>