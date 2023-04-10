<form action="actions.php" autocomplete="off" method="post">
    <input type="hidden" name="actionid" value="editresto">
    <input type="hidden" name="id" value="<?php echo $_REQUEST['id'] ?>">
    <?php 
        $qry = "select * from restaurants where id=?";
        $result = $db->fetch_data($qry,array($_REQUEST['id']));
    ?>
  <div class="mb-3">
    <label for="restaurant_name" class="form-label">Restaurant Name</label>
    <input type="text" class="form-control" name="restaurant_name" id="restaurant_name"  value="<?php echo $result['restaurant_name'] ?>">
  </div>
  <div class="mb-3">
    <label for="restaurant_address" class="form-label">Restaurant Address</label>
    <input type="text" class="form-control" id="restaurant_address" name="restaurant_address" value="<?php echo $result['restaurant_address'] ?>">
  </div>
  <div class="mb-3">
    <label for="restaurant_category" class="form-label">Restaurant Category</label>
    <input type="text" class="form-control" id="restaurant_category" name="restaurant_category" value="<?php echo $result['restaurant_category'] ?>">
  </div>
  <button type="submit" class="btn btn-primary">Update</button>
</form>