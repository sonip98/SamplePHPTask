<?php 
    // $where = '';
    // $id = '';
    // if(isset($_REQUEST['id'])){
    //     $where .= 'where fk_resto_id=?';
    //     $id = $_REQUEST['id'];
    // }
    // $qry = "select *, e.id as employeeID from employees e left join restaurants r on r.id=e.fk_resto_id $where";
    // $result = $db->fetch_data($qry,array($id));

    // if(!$result){
    //     echo "<a href='index.php?cmd=add_employee'>Add Employee</a>";
    // }else{
    //     echo $result['employee_name'].': '.$result['employee_bdate'].'<a href="index.php?cmd=edit_employee&id='.$result['employeeID'].'">Edit</a><a href="index.php?cmd=list_resto&id='.$result['id'].'">Show Restaurant</a>'.'<br/>';
    // }
?>

<div class="list-employee">
    <?php
        $where = 'where e.deleted_at IS NULL';
        $id = array();
        if(isset($_REQUEST['id'])){
            $where .= ' AND fk_resto_id=?';
            $id[] = $_REQUEST['id'];
        }elseif(isset($_REQUEST['eid'])){
            $where .= ' AND  e.id=?';
            $id[] = $_REQUEST['eid'];
        }
        $qry = "select *, e.id as employeeID from employees e left join restaurants r on r.id=e.fk_resto_id $where";
        $result = $db->runQuery($qry,$id);
        
        if(isset($_REQUEST['eid']) && $result->rowCount()==1){
            while ($row = $result->fetchObject()) {
                ?>
                <section class="py-5 text-lef container">
                    <div class="row py-lg-5">
                    <div class="col-lg-6 col-md-8 mx-auto">
                        <h1 class="fw-light">Employee name:  <?php echo $row->employee_name ?></h1>
                        <h3 class="fw-light">Date of birth: <?php echo $row->employee_bdate ?></h3>
                        <h3 class="fw-light">Employed at: <?php echo '<a href="index.php?cmd=list_resto&id='.$row->fk_resto_id.'">'.$row->restaurant_name.'</a>' ?></h3>
                        <p class="lead text-muted"><?php echo $row->employee_gender=='m' ? 'Male' : 'Female' ?></p><p>
                        <a href="index.php?cmd=edit_resto&id=<?php echo $row->id ?>" class="btn btn-primary my-2">Edit Details</a></p>
                    </div>
                    </div>
                </section>
                <?php
            }
        }else{
            if(isset($_REQUEST['id'])){
                $resto_name = $db->fetch_data("select restaurant_name from restaurants where id=?",$id);
                echo "<h3>Restaurant Name: ".$resto_name['restaurant_name']."</h3>";
                echo "<a href='index.php?cmd=add_employee&rid=".$_REQUEST['id']."'><button class='btn btn-outline-primary'>Add Employee</button></a>";
            }
            ?>  
            
        <h4 class="py-3">All registered employees</h4>
        
            <table id="tblUser" class="table table-striped">
            <thead>
                <?php if(isset($_SESSION['username'])): ?>
                <th>Employee ID</th>
                <?php endif; ?>
                <th>Employee Name</th>
                <?php if(!isset($_REQUEST['id'])){ ?>
                <th>Employed at</th>
                <?php } ?>
                <?php if(isset($_SESSION['username'])): ?>
                <th>Action</th>
                <?php endif; ?>
            </thead>
            <tbody>
            <?php
            while ($row = $result->fetchObject()) {
                ?>
                <tr>
                    <?php if(isset($_SESSION['username'])): ?>
                    <td><?php echo $row->employeeID ?></td>
                    <?php endif; ?>
                    <td><?php echo $row->employee_name ?></td>
                    <?php if(!isset($_REQUEST['id'])){ ?>
                    <td><?php if(isset($_SESSION['username'])): ?><a href="index.php?cmd=list_resto&id=<?php echo $row->fk_resto_id ?>"><?php echo $row->restaurant_name ?></a><?php else: ?><?php echo $row->restaurant_name ?><?php endif; ?></td>
                    <?php } ?>
                    <?php if(isset($_SESSION['username'])): ?>
                    <td><a href="index.php?cmd=show_employees&eid=<?php echo $row->employeeID ?>"><button class="btn btn-outline-success">View</button></a> <a href="index.php?cmd=edit_employee&eid=<?php echo $row->employeeID ?>"><button class="btn btn-outline-warning">Edit</button></a></td>
                    <?php endif; ?>
                </tr>
                <?php
            }
            ?>
            </tbody>
            </table>
            <?php
        }

        
    ?>
</div>
