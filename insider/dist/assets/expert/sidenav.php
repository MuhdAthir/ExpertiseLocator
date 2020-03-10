<div id="layoutSidenav_nav">
  <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
      <div class="nav">
        <div class="sb-sidenav-menu-heading">Core</div>
		  <a class="nav-link" href="index.php">
			  <div class="sb-nav-link-icon"><i class="fas fa-address-card"></i></div>Preview Profile
		  </a>
		  <a class="nav-link" href="profile-edit.php">
			  <div class="sb-nav-link-icon"><i class="fas fa-user-alt"></i></div>Edit Profile
		  </a>
        <div class="sb-sidenav-menu-heading">Management</div>
		  <a class="nav-link" href="skill.php">
			  <div class="sb-nav-link-icon"><i class="fas fa-chess"></i></div>Skills
		  </a>
		  <a class="nav-link" href="achievement.php">
			  <div class="sb-nav-link-icon"><i class="fas fa-award"></i></div>Achievements
		  </a> 		  
		  <a class="nav-link" href="education.php">
			  <div class="sb-nav-link-icon"><i class="fas fa-university"></i></div>Educations
		  </a> 
		</div>
    </div>
    <div class="sb-sidenav-footer">
      <div class="small">Logged in as:</div>
      <?php echo $_SESSION['name'] ?> </div>
  </nav>
</div>