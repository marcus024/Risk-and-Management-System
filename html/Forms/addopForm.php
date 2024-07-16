<form action="../Create/backendCreateOpp.php" onsubmit="window.location.reload()" method="post" >
        <div class ="row mb-4">
          <div class="col mb-1">
            <label class="col-sm-15 col-form-label" for="basic-default-company">Year Identified</label>
              <input type="text" class="form-control" name="year_id" id="year_id" />  
          </div>
          <div class=" col mb-1">
            <label class="col-sm-15 col-form-label" for="basic-default-company">Opportunity Number</label>
              <div class="col-sm-16">
                <input
                  required
                  type="text"
                  class="form-control"
                  id="basic-default-company"
                  placeholder=""
                  name="opp_num"
                />
              </div>
          </div>
          <div class="col mb-1">
            <label class="col-sm-15 col-form-label" for="basic-default-company">Division</label>
              <div class="col-sm-16">
                <select  required id= 'division' name = "division"  class = "form-control" single>
                    <?php 
                        $stm = $conn->query("SELECT * FROM division_cat ");
                        $output="";
                        $output.='
                        <option value= "" active >Select</option>';
                        while($row = $stm->fetch_assoc()) {
                        $output .=" 
                        <option value = '$row[div_desc]'>$row[div_desc]</option>";     
                        }
                        echo $output;
                    ?>
                </select>
              </div>
          </div>
          <div class="col mb-1">
            <label class="col-sm-15 col-form-label" for="basic-default-company">Process/Program</label>
              <div class="col-sm-16">
                <select   name = "process"  id= "process" class = "form-control" single>
                </select>
              </div>
          </div>
          <div class="col mb-1">
            <label class="col-sm-15 col-form-label" for="basic-default-company">Frequency</label>
              <div class="col-sm-16">
                <select required name = "frequency"  class = "form-select"  >
                  <?php 
                      $stm = $conn->query("SELECT * FROM lookup_table WHERE lookupcat_ID = 3");
                      $output="";
                      $output.='
                      <option value= "" active>Select</option>';
                      while($row = $stm->fetch_assoc()) {
                      $output .="<option  value = '$row[lookupcat_DESC]'>$row[lookupcat_DESC]</option>"; 
                      }
                      echo $output;
                  ?>
                </select>
              </div>
          </div>
        </div>
        <div class="row mb-4">
          <div class="col mb-1">
            <label class="col-sm-11 col-form-label" for="basic-default-company">Internal Factor</label>
              <div class="col-sm-12">
                <select    name = "factor[]"  class = "form-select " multiple >
                  <?php 
                      $stm = $conn->query("SELECT * FROM lookup_table WHERE lookupcat_ID = 6");
                      $output="";
                      $output.='
                      <option value= "" active>Select</option>';
                      while($row = $stm->fetch_assoc()) {
                      $output .="<option  value = '$row[lookupcat_DESC]'>$row[lookupcat_DESC]</option>"; 
                      }
                      echo $output;
                  ?>
                </select>
              </div>
          </div>
          <div class="col mb-1">
            <label class="col-sm-11 col-form-label" for="basic-default-company">External Factors</label>
              <div class="col-sm-12">
                <select    name = "factor1[]" class = "form-select " multiple >
                  <?php 
                      $stm = $conn->query("SELECT * FROM lookup_table WHERE lookupcat_ID = 5");
                      $output="";
                      $output.='
                      <option value= "" active>Select</option>';
                      while($row = $stm->fetch_assoc()) {
                      $output .="<option  value = '$row[lookupcat_DESC]'>$row[lookupcat_DESC]</option>"; 
                      }
                      echo $output;
                  ?>
                </select>
            </div>
          </div>
          <div class="col mb-1">
          <label class="col-sm-11 col-form-label" for="basic-default-company">Interested Parties</label>
            <div class="col-sm-12">
              <!-- <select    name = "factor2[]" id="exampleFormControlSelect2" class = "form-select js-example-basic-multiple" multiple > -->
              <select    name = "factor2[]" id="exampleFormControlSelect2" class = "form-select " multiple >
                <?php 
                    $stm = $conn->query("SELECT * FROM lookup_table WHERE lookupcat_ID = 7");
                    $output="";
                    $output.='
                    <option value= "" active>Select</option>';
                    while($row = $stm->fetch_assoc()) {
                    $output .="<option  value = '$row[lookupcat_DESC]'>$row[lookupcat_DESC]</option>"; 
                    }
                    echo $output;
                ?>
              </select>
            </div> 
          </div>
        </div>
        <div class ="row mb-4">
          <div class="col mb-1">
            <label class="col-sm-3 col-form-label" for="basic-default-company">Opportunity</label>
              <div class="col-sm-12">
                <textarea class="form-control" name="opp" id="" cols="40" rows="2.8"></textarea>
              </div>
          </div>
          <div class="col mb-1">
            <label class="col-sm-3 col-form-label" for="basic-default-company">Impact</label>
              <div class="col-sm-13">
                <textarea class="form-control" name="impact" id="" cols="70" rows="2.5"></textarea>
              </div>
          </div>
        </div>
        <div class ="row mb-4">
          <div class="col mb-1">
            <div class="row">
                <div class="col">
                <label class="col-sm-12 col-form-label " for="basic-default-company">Likelihood</label>
                </div>
                <div class="col  justify-content-end">
                  <button
                    type="button"
                    class="btn btn-danger"
                    data-bs-toggle="tooltip"
                    data-bs-offset="0,4"
                    data-bs-placement="top"
                    data-bs-html="true"
                    title="
                           <span>1 Occurred in the last 2 years</span> <br><br>
                           <span>2 Occurred once a year</span> <br><br>
                           <span>3 Occurred at least once per semester</span> <br><br>
                           <span>4 Occurred once or more within a quarter</span> <br><br>
                           <span>5 Happens once or more times per month</span>
                           ">
                  </button>
                </div>
            </div>
              <select  required onchange="myFunction()" name="likelihood" class="form-select" id="like" aria-label="Default select example">
                <option selected>Select</option>
                <option value="1">1 Rare</option>
                <option value="2">2 Moderate</option>
                <option value="3">3 Possible</option>
                <option value="4">4 Likely</option>
                <option value="5">5 Almost Certain</option>
              </select>
          </div>
          <div class="col mb-1">
            <div class="row">
                <div class="col">
                  <label class="col-sm-12 col-form-label " for="basic-default-company">Benefit</label>
                </div>
                <div class="col  justify-content-end">
                  <button
                    type="button"
                    class="btn btn-danger"
                    data-bs-toggle="tooltip"
                    data-bs-offset="0,4"
                    data-bs-placement="top"
                    data-bs-html="true"
                    title="
                           <span>1 Potential improvement to the process</span> <br><br>
                           <span>2 Recognizable/visible improvement to the process</span> <br><br>
                           <span>3 Significant benefit to the organization</span> <br><br>
                           <span>4 Major contributory to the objectives of the organization</span> <br><br>
                           <span>5 Leads to innovative change in the organization’s context, policies and programs</span>
                           ">
                  </button>
                </div>
            </div>
            <select  required onchange="myFunction()"name="benefit" class="form-select" id="sev" aria-label="Default select example">
              <option selected>Select</option>
              <option value="1">1 Minimal</option>
              <option value="2">2 Minor</option>
              <option value="3">3 Significant</option>
              <option value="4">4 Major</option>
              <option value="5">5 Beneficial</option>
            </select>
          </div> 
          <div class="col mb-1">
            <label class="col-sm-10 col-form-label" for="basic-default-name">OPN</label>
              <div class="col-sm-15">
                <div class="input-group input-group-merge speech-to-text">
                  <textarea class="form-control" name="rpn" id="riskN" rows="1"></textarea>
                </div>
              </div>
          </div>
            <!-- Function to Automate Evaluation Result and Monitoring Frequency using Likelihood an Severity -->
            <script>
              function myFunction() {
                var x = document.getElementById("like").value;
                var y = document.getElementById("sev").value;
                var result = parseInt(x) * parseInt(y); 
                if(result>=1 && result <= 3 ){
                  document.getElementById("riskN").innerHTML =  result;
                  document.getElementById("demo").innerHTML = "Good";
                  document.getElementById("mon").innerHTML = "Annual";
                }if(result>=4 && result <= 10 ){
                  document.getElementById("riskN").innerHTML =  result;
                  document.getElementById("demo").innerHTML = "Better";
                  document.getElementById("mon").innerHTML = "Semestral";
                }if(result>=11 && result <= 25 ){
                  document.getElementById("riskN").innerHTML =  result;
                  document.getElementById("demo").innerHTML = "Best";
                  document.getElementById("mon").innerHTML = "Quarterly";
                }   
              }
            </script>
          <div class="col mb-3">
            <div class="row">
                  <div class="col">
                  <label class="col-sm-15 col-form-label " for="basic-default-company">Evaluation</label>
                  </div>
                  <div class="col  justify-content-end">
                    <button
                      type="button"
                      class="btn btn-danger"
                      data-bs-toggle="tooltip"
                      data-bs-offset="0,2"
                      data-bs-placement="top"
                      data-bs-html="true"
                      title="
                            <span>1-3   Monitor possible changes to the process</span> <br><br>
                            <span>4-10  Take advantage of the opportunity</span> <br><br>
                            <span>11-25 Adopt new strategies</span> <br><br>
                            ">
                    </button>
                  </div>
            </div>
              <div class="col-sm-15">
                <textarea  class= "form-control" name="eval_res" id="demo" cols="8" rows="1.4"></textarea>
              </div>
          </div>
          <div class="col mb-1">
            <label class="col-sm-15 col-form-label" for="basic-default-company">Monitoring Frequency</label>
              <div class="col-sm-15">
                <textarea  class= "form-control" name="monitoring" id="mon" cols="8" rows="1.4"></textarea>
              </div> 
          </div>
        </div>
        <!-- Sample Set Up -->
        <!-- Last Row -->
        <div class="row" id="riskForm">
          <div class ="row mb-4">
            <div class="col">
              <div class="row mb-4">
                <div class="col mb-1">
                  <label class="col-sm-5 col-form-label" for="basic-default-company">Treatment</label>
                    <select  required name="treatment[]" class="form-select"  aria-label="Default select example">
                      <option value="">Select</option>
                      <option value="Tolerate">Tolerate</option>
                      <option value="Treat">Treat</option>
                      <option value="Transfer">Transfer</option>
                      <option value="Terminate">Terminate</option>
                    </select>
                </div>
              </div>
              <div class="row ">
                <div class="col mb-1">
                  <label class="col-sm-15 col-form-label" for="basic-default-company">Start of Activity</label>
                  <div class="col-sm-16">
                    <input
                      required
                      type="date"
                      class="form-control"
                      id="basic-default-company"
                      placeholder=""
                      name="start[]"
                    />
                  </div>
                </div>
                <div class=" col mb-1">
                  <label class="col-sm-15 col-form-label" for="basic-default-company">End of Activity</label>
                  <div class="col-sm-16">
                    <input
                      required
                      type="date"
                      class="form-control"
                      id="basic-default-company"
                      placeholder=""
                      name="end[]"
                    />
                  </div>
                </div>
              </div>
            </div>
            <div class=" col mb-1">
              <label class="col-sm-15 col-form-label" for="basic-default-company">Action Plan</label>
              <div class="col-sm-12">
                    <textarea class="form-control" name="action_plan[]" id="" cols="70" rows="5.2"></textarea>
              </div>
            </div>
          </div>
          <div class ="row mb-4">
            <div class="col mb-1">
              <label class="col-sm-15 col-form-label" for="basic-default-company">Responsible</label>
              <input
                      required
                      type="text"
                      class="form-control"
                      id="basic-default-company"
                      placeholder=""
                      name="responsible[]"
                    />
            </div>
            <div class=" col mb-1">
              <label class="col-sm-15 col-form-label" for="basic-default-company">Measure of Effectiveness</label>
              <div class="col-sm-12">
                <select  required name="measure[]" class="form-select"  aria-label="Default select example">
                  <option value="">Select</option>
                  <option value="Effective">Effective</option>
                  <option value="Not Effective">Not Effective</option>
                </select>
              </div>
            </div>
            <div class=" col mb-1">
              <label class="col-sm-15 col-form-label" for="basic-default-company">Add More</label>
              <div class="col-sm-8">
                <button class="btn btn-success add">Add</button>
              </div>
            </div>
          </div>
        </div>
        <!-- Sample Set up -->
        <div class="demo-inline-spacing">
          <button type="Submit" name= "insertOpp" class="btn btn-primary">Submit</button>
          <button type="button" onclick="window.location.reload()" class="btn btn-secondary">Cancel</button>
        </div>
      </form>
      <script>
         $(document).ready(function(){
    $(".add").click(function(e){
     e.preventDefault();
     $("#riskForm").prepend(`<div>
      <div class ="row mb-4">
        <div class="col">
          <div class="row mb-4">
            <div class="col mb-1">
              <label class="col-sm-5 col-form-label" for="basic-default-company">Treatment</label>
                <select  required name="treatment[]" class="form-select"  aria-label="Default select example">
                  <option value="">Select</option>
                  <option value="Tolerate of Take It">Tolerate of Take It</option>
                  <option value="Exploit">Exploit</option>
                  <option value="Share">Share</option>
                  <option value="Enhance">Enhance</option>
                </select>
            </div>
          </div>
          <div class="row ">
            <div class="col mb-1">
              <label class="col-sm-15 col-form-label" for="basic-default-company">Start of Activity</label>
              <div class="col-sm-16">
                <input
                  required
                  type="date"
                  class="form-control"
                  id="basic-default-company"
                  placeholder=""
                  name="start[]"
                />
              </div>
            </div>
            <div class=" col mb-1">
              <label class="col-sm-15 col-form-label" for="basic-default-company">End of Activity</label>
              <div class="col-sm-16">
                <input
                  required
                  type="date"
                  class="form-control"
                  id="basic-default-company"
                  placeholder=""
                  name="end[]"
                />
              </div>
            </div>
          </div>
        </div>
        <div class=" col mb-1">
          <label class="col-sm-15 col-form-label" for="basic-default-company">Action Plan</label>
          <div class="col-sm-12">
                <textarea class="form-control" name="action_plan[]" id="" cols="70" rows="5.2"></textarea>
          </div>
        </div>
      </div>
      <div class ="row mb-4">
        <div class="col mb-1">
          <label class="col-sm-15 col-form-label" for="basic-default-company">Responsible</label>
          <input
            required
            type="text"
            class="form-control"
            id="basic-default-company"
            placeholder=""
            name="responsible[]"
          />
        </div>
        <div class=" col mb-1">
          <label class="col-sm-15 col-form-label" for="basic-default-company">Measure of Effectiveness</label>
          <div class="col-sm-12">
            <select  required name="measure[]" class="form-select"  aria-label="Default select example">
              <option value="">Select</option>
              <option value="Effective">Effective</option>
              <option value="Not Effective">Not Effective</option>
            </select>
          </div>
        </div>
        <div class=" col mb-1">
          <label class="col-sm-15 col-form-label" for="basic-default-company">Add More</label>
          <div class="col-sm-8">
            <button class="btn btn-danger remove">Remove</button>
          </div>
        </div>
      </div> 
      </div>
     `);
    });
    $(document).on('click', ' .remove', function(e){
          e.preventDefault();
          $(this).closest('.row').parent().remove();
        });
  });
      </script>
