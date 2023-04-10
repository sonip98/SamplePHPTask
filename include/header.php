<?php
    $active = isset($_REQUEST['cmd']) ? $_REQUEST['cmd'] : '';
?>

<style>
.nav{
    background-color:#333;    
    overflow: hidden;
}
.nav a {
    float: left;
    color: #f2f2f2f2;
    padding: 14px 16px;
    text-align: center;
    font-size: 17px;
    text-decoration: none;
    margin-right: 5px;
}
.nav a:hover{
    background-color: #ddd;
    color: #333;
}
</style>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Home</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <?php if(isset($_SESSION['username'])): ?>
        <li class="nav-item">
          <a href="index.php?cmd=add_resto" class="nav-link <?php echo $active=='add_resto' ? ' active' : '' ?>">Add Restaurant</a>
        </li>
        <?php endif; ?>
        <li class="nav-item">
          <a href="index.php?cmd=list_resto" class="nav-link <?php echo $active=='list_resto' ? ' active' : '' ?>">List Restaurant</a>
        </li>
        <?php if(isset($_SESSION['username'])): ?>
        <li class="nav-item">
          <a href="index.php?cmd=add_employee" class="nav-link <?php echo $active=='add_employee' ? ' active' : '' ?>">Add Employee</a>
        </li>
        <li class="nav-item">
          <a href="index.php?cmd=show_employees" class="nav-link <?php echo $active=='show_employees' ? ' active' : '' ?>">List Employee</a>
        </li>
        <?php endif; ?>
      </ul>
    </div>
    <?php if(!isset($_SESSION['username'])){ ?>
        <a href="index.php?cmd=login"><button class="btn btn-outline-success" type="submit">Login</button></a>
    <?php }else{ ?>
        <a href="index.php?cmd=logout"><button class="btn btn-outline-danger" type="submit">Logout</button></a>
    <?php } ?>
  </div>
</nav>