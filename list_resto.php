<div class="list-restaurant">
    <h2>Registered Restaurants</h2>
    <?php
        $where = 'where deleted_at IS NULL';
        $id = array();
        if(isset($_REQUEST['id'])){
            $where .= ' AND id=?';
            $id[] = $_REQUEST['id'];
        }
        $qry = "SELECT * FROM restaurants $where";
        $result = $db->runQuery($qry,$id);
        
        if(isset($_REQUEST['id']) && $result->rowCount()==1){
            while ($row = $result->fetchObject()) {
                ?>
                <section class="py-5 text-center container">
                    <div class="row py-lg-5">
                    <div class="col-lg-6 col-md-8 mx-auto">
                        <h1 class="fw-light"><?php echo $row->restaurant_name ?></h1>
                        <h3 class="fw-light"><?php echo $row->restaurant_category ?></h3>
                        <p class="lead text-muted"><?php echo $row->restaurant_address ?></p>
                        <p>
                        <a href="index.php?cmd=show_employees&id=<?php echo $row->id ?>" class="btn btn-success my-2">Show employees</a>
                        </p><p>
                        <a href="index.php?cmd=edit_resto&id=<?php echo $row->id ?>" class="btn btn-primary my-2">Edit Details</a></p>
                    </div>
                    </div>
                </section>
                <?php
            }
        }else{
            while ($row = $result->fetchObject()) {
                $e_qry = "SELECT * FROM employees where fk_resto_id=?";
                $e_result = $db->runQuery($e_qry,array($row->id));
                ?>
                <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"><?php if(isset($_SESSION['username'])): ?><a href="index.php?cmd=list_resto&id=<?php echo $row->id ?>"><?php echo $row->restaurant_name ?></a><?php else: ?><?php echo $row->restaurant_name ?><?php endif; ?></h5>
                    <h6 class="card-subtitle mb-2 text-body-secondary"><?php echo $row->restaurant_category ?></h6>
                    <p class="card-text"><?php echo $row->restaurant_address ?></p>
                    <?php if(isset($_SESSION['username'])): ?>
                    <a href="index.php?cmd=edit_resto&id=<?php echo $row->id ?>" class="card-link">Edit</a>
                    <a href="index.php?cmd=show_employees&id=<?php echo $row->id ?>" class="card-link">Show employees(<?php echo $e_result->rowCount() ?>)</a>
                    <?php endif; ?>
                </div>
                </div>
                <?php
            }
        }

    ?>
</div>
