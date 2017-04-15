<div id="page-content-wrapper">
    <nav class="navbar navbar-light navbar-fixed-top" style="background-color: #002a40;">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header navbar-lefts">
        	<ul class="nav navbar-nav" style="margin-left:90px;">
				<li><a href="#" class="toggle-nav" id="bars"><i class="fa fa-bars fa-2x"></i></a></li>
        		<a href="index.php"><img src="../assets/images/logo3.png" style="width:260px;height:50px; margin-right: 20px;" ></a>
				
			</ul>
		</div>
		<div class="navbar-header navbar-right" style="margin-left:90px;">
				<ul class="nav navbar-nav" style="margin-left:90px;">
				
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"> Admin:&nbsp;{{{ Auth::user()->username }}}
					</span> <span class="caret"></span></a>
					<ul class="dropdown-menu" style="background-color: #D7DBDD;">
						<li><a href="addUser.php"><span class="glyphicon glyphicon-plus"></span> Add User</a></li>
						<li><a href="ManageUser.php"><span class="glyphicon glyphicon-edit"></span> Manage User</a></li>
						<li role="separator" class="divider"></li>
						<li><a href="logout.php">Logout</a></li>
					</ul>
				</li>
			</ul>
        </div>              
     </div><!-- /.container-fluid -->
	</nav>
</div>