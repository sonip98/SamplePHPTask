<form action="actions.php" method="post">
    <input type="hidden" name="actionid" value="addemployee">
    <?php  
            if(isset($_REQUEST['rid'])){
                ?>
                <input type="hidden" name="fk_resto_id" value="<?php echo $_REQUEST['rid'] ?>">
                <?php
            }else{
                ?>
                <div class="mb-3">
                <label for="resto_name" class="form-label">Restaurant Name</label>
                <select name="fk_resto_id" id="resto_name" class="form-control">
                    <option value="">Select Resto</option>
                    <?php
                        $qry = "SELECT id, restaurant_name FROM restaurants";
                        $result = $db->runQuery($qry,array());
                        while ($row = $result->fetchObject()) {
                            echo '<option value="'.$row->id.'">'.$row->restaurant_name.'</option>';
                        }
                    ?>                    
                </select>
                </div>
                <?php
            }
        ?>
  <div class="mb-3">
    <label for="employee_name" class="form-label">Employee Name</label>
    <input type="text" class="form-control" id="employee_name" name="employee_name">
  </div>

  <div class="mb-3">
  <label for="employee_gender" class="form-label">Employee Gender</label>
    <select name="employee_gender" class="form-control" id="employee_gender">
        <option value="">Select Gender</option>
        <option value="m">Male</option>
        <option value="f">Female</option>
    </select>
    </div>
    
<div class="mb-3">
    <label for="employee_bdate" class="form-label">Employee birthdate</label>
    <input type="date" class="form-control" id="employee_bdate" name="employee_bdate">
  </div>
  <button type="submit" class="btn btn-primary">Add</button>
</form>