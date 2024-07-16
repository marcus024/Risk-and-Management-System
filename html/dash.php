<?php
session_start();
$_SESSION["cat"] = "Dash";
$_SESSION["sub-cat"] = "";
include("h.php");
?>
<style>
    /* .divN {
      background-color: yellow;
    }
    .divM {
      background-color: orange;
    }
    .divQ {
      background-color: red;
    }
    .divP {
      background-color: blue;
    } */
    .home-title {
      padding: 15px;
      text-align: start;
      font-size: 24px;
      color: #333;
      font-weight: bold;
      letter-spacing: 3px;
    }
  </style>
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="row">
    <div class="col-lg-13 mb-4 ">
      <div class="card">
        <div class="d-flex justify-content-start">
          <div class="col-sm-1j">
            <div class="card-body">
              <div class ="row mr-10 div0">
                <img style="width: 190px; height: 115px;"src="ecclogo.jpg" alt="Image Description">
              <div class="col ">
                <div class="home-title">
                  <h1>Employees' Compensation Commission</h1>
                  <h5>Current User : <?php echo $_SESSION['fullName'] ?></h5>
                </div>
              </div>   
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="d-flex justify-content-center">
      <div class="card">
        <div class="row row-bordered g-0">
          <div class="col-md-9">
            <h5 class="card-header m-0 me-2 pb-3">History Records</h5>
          </div>
          <div class="card h-120">
            <div class="card-body">
              <div class="table-wrapper-scroll-y my-custom-scrollbar">
                <table class="table datatable">
                  <thead>
                    <tr>
                      <th>Activity</th>
                      <th>Status</th>
                      <th>Encoder</th>
                      <th>Time</th>
                    </tr>
                  </thead>
                  <tbody class="table-border-bottom-0">
                      <?php 
                          include('database.php');
                          $query = "SELECT  * FROM history ORDER by hist_id DESC ";
                          $query_run = mysqli_query($conn, $query);
                          if(mysqli_num_rows($query_run) > 0)
                          {
                              foreach($query_run as $history)
                              {
                                  ?>
                                  <tr>
                                      <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong><?= $history['actDesc']; ?></strong></td>
                                      <td><span class="badge bg-label-primary me-1"><?= $history['stat']; ?></span></td>
                                      <td><?= $history['encoder']; ?></td>  
                                      <td><?= $history['timest']; ?></td> 
                                  </tr>
                          <?php
                              }
                          }
                          else
                          {
                            echo "<h6> &nbsp; &nbsp; &nbsp; No Record Found &nbsp; &nbsp;</h6>";
                          }
                      ?> 
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
include("f.php");
?>