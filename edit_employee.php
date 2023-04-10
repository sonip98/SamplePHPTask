<div class="edit-employee">
    
<form action="actions.php" method="post">
    <input type="hidden" name="actionid" value="editemployee">
    <input type="hidden" name="id" value="<?php echo $_REQUEST['eid'] ?>">
    <?php 
        $qry = "select * from employees where id=?";
        $result = $db->fetch_data($qry,array($_REQUEST['eid']));
    ?>
    <div class="mb-3">
    <label for="resto_name" class="form-label">Restaurant Name</label>
    <select name="fk_resto_id" id="resto_name" class="form-control">
        <option value="">Select Resto</option>
        <?php
            $qry = "SELECT id, restaurant_name FROM restaurants";
            $r_name = $db->runQuery($qry,array());
            while ($row = $r_name->fetchObject()) {
                $selected = $result['fk_resto_id']==$row->id ? 'selected' : '';
                echo '<option value="'.$row->id.'" '.$selected.'>'.$row->restaurant_name.'</option>';
            }
        ?>                    
    </select>
    </div>
  <div class="mb-3">
    <label for="employee_name" class="form-label">Employee Name</label>
    <input type="text" class="form-control" id="employee_name" name="employee_name" value="<?php echo $result['employee_name'] ?>">
  </div>

  <div class="mb-3">
  <label for="employee_gender" class="form-label">Employee Gender</label>
    <select name="employee_gender" class="form-control" id="employee_gender">
        <option value="">Select Gender</option>
        <option value="m" <?php echo $result['employee_gender']=='m'?'selected':'' ?>>Male</option>
        <option value="f" <?php echo $result['employee_gender']=='f'?'selected':'' ?>>Female</option>
    </select>
    </div>
    
<div class="mb-3">
    <label for="employee_bdate" class="form-label">Employee birthdate</label>
    <input type="date" class="form-control" id="employee_bdate" name="employee_bdate" value="<?php echo $result['employee_bdate'] ?>">
  </div>
  <button type="submit" class="btn btn-primary">Update</button>
</form>
</div>
