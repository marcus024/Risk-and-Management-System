        <div class="table-wrapper-scroll-y my-custom-scrollbar">
            <div class="table-responsive text-nowrap" style="overflow-y:auto;">
                <table class="table datatable">
                    <thead class="table-light">
                      <tr>
                        <th>ID</th>
                        <th>Year Identified</th>
                        <th>Risk Number</th>
                        <th>Programs</th>
                        <th>Risk</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                     <!-- Content PHP -->
                     
                   
                          <?php 
                            $query = "SELECT * FROM risk_table WHERE deleted=0 && rpn != 0";
                            $query_run = mysqli_query($conn, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                foreach($query_run as $student)
                                {
                          ?>
                                <tr>
                                    <td><?= $student['r_id']; ?></td>
                                    <td><?= $student['year_id']; ?></td>
                                    <td><?= $student['risk_num']; ?></td>
                                    <td><?= $student['process']; ?></td>
                                    <td><?= $student['risks']; ?></td>
                                    <td>
                                    
                                    <a class="btn btn-success" href="../viewFront/viewRisk.php?id=<?php echo $student['r_id']; ?>">View</a>
                                    <a class="btn btn-danger" href="../Delete/backendDeleteRisk.php?id=<?php echo $student['r_id']; ?>">Delete</a>
                                    </td>   
                                </tr>
                          <?php
                                }
                            }
                            else
                            {
                              echo "<h6> &nbsp; &nbsp; &nbsp; No Record Found &nbsp; &nbsp;</h6>";
                            }
                          ?>
                      <!-- Content PHP -->
                    </tbody>
                </table>
            </div>
        </div>
        
            
