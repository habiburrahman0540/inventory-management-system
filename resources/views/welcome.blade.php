<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from bootstrapmaster.com/live/metro/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Jan 2018 16:56:12 GMT -->
<head>
	
	<!-- start: Meta -->
	<meta charset="utf-8">
	<title>Inventory Management System</title>
	<meta name="description" content="Metro Admin Template.">
	<meta name="author" content="Łukasz Holeczek">
	<meta name="keyword" content="Metro, Metro UI, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
	<!-- end: Meta -->
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<!-- start: Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- end: Mobile Specific -->
	

	<!-- start: CSS -->
	<link id="bootstrap-style" href="{{asset('backend/')}}/css/bootstrap.min.css" rel="stylesheet">
	<link href="{{asset('backend/')}}/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link id="base-style" href="{{asset('backend/')}}/css/style.css" rel="stylesheet">
	<link id="base-style-responsive" href="{{asset('backend/')}}/css/style-responsive.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&amp;subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
	<!-- end: CSS -->
	

	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<link id="ie-style" href="{{asset('backend/')}}/css/ie.css" rel="stylesheet">
	<![endif]-->
	
	<!--[if IE 9]>
		<link id="ie9style" href="{{asset('backend/')}}/css/ie9.css" rel="stylesheet">
	<![endif]-->
		
	<!-- start: Favicon -->
	<link rel="shortcut icon" href="{{asset('backend/')}}/img/favicon.ico">
	<!-- end: Favicon -->		
</head>

<body>
	<div id="inventory">
		<!-- start: Header -->

	<div class="navbar" id="navbar" style="display: none;" v-show="$route.path === '/' || $route.path === '/forgetpassword' ? false : true" >
		<div class="navbar-inner">
			<div class="container-fluid">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="brand" href="https://www.fiverr.com/users/mdhabib058/manage_gigs" target="_blank" style="color: #FFFFFF;font-weight:bold"><span>Inventory Management System</span></a>
								
				<!-- start: Header Menu -->
				<div class="nav-no-collapse header-nav">
					<ul class="nav pull-right">
						<li class="dropdown hidden-phone">
							<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
								<i class="halflings-icon white warning-sign"></i>
							</a>
							<ul class="dropdown-menu notifications">
								<li class="dropdown-menu-title">
 									<span>You have 11 notifications</span>
									<a href="#refresh"><i class="icon-repeat"></i></a>
								</li>	
                            	<li>
                                    <a href="#">
										<span class="icon blue"><i class="icon-user"></i></span>
										<span class="message">New user registration</span>
										<span class="time">1 min</span> 
                                    </a>
                                </li>
								<li>
                                    <a href="#">
										<span class="icon green"><i class="icon-comment-alt"></i></span>
										<span class="message">New comment</span>
										<span class="time">7 min</span> 
                                    </a>
                                </li>
								<li>
                                    <a href="#">
										<span class="icon green"><i class="icon-comment-alt"></i></span>
										<span class="message">New comment</span>
										<span class="time">8 min</span> 
                                    </a>
                                </li>
								<li>
                                    <a href="#">
										<span class="icon green"><i class="icon-comment-alt"></i></span>
										<span class="message">New comment</span>
										<span class="time">16 min</span> 
                                    </a>
                                </li>
								<li>
                                    <a href="#">
										<span class="icon blue"><i class="icon-user"></i></span>
										<span class="message">New user registration</span>
										<span class="time">36 min</span> 
                                    </a>
                                </li>
								<li>
                                    <a href="#">
										<span class="icon yellow"><i class="icon-shopping-cart"></i></span>
										<span class="message">2 items sold</span>
										<span class="time">1 hour</span> 
                                    </a>
                                </li>
								<li class="warning">
                                    <a href="#">
										<span class="icon red"><i class="icon-user"></i></span>
										<span class="message">User deleted account</span>
										<span class="time">2 hour</span> 
                                    </a>
                                </li>
								<li class="warning">
                                    <a href="#">
										<span class="icon red"><i class="icon-shopping-cart"></i></span>
										<span class="message">Transaction was canceled</span>
										<span class="time">6 hour</span> 
                                    </a>
                                </li>
								<li>
                                    <a href="#">
										<span class="icon green"><i class="icon-comment-alt"></i></span>
										<span class="message">New comment</span>
										<span class="time">yesterday</span> 
                                    </a>
                                </li>
								<li>
                                    <a href="#">
										<span class="icon blue"><i class="icon-user"></i></span>
										<span class="message">New user registration</span>
										<span class="time">yesterday</span> 
                                    </a>
                                </li>
                                <li class="dropdown-menu-sub-footer">
                            		<a>View all notifications</a>
								</li>	
							</ul>
						</li>
						<!-- start: Notifications Dropdown -->
						<li class="dropdown hidden-phone">
							<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
								<i class="halflings-icon white tasks"></i>
							</a>
							<ul class="dropdown-menu tasks">
								<li class="dropdown-menu-title">
 									<span>You have 17 tasks in progress</span>
									<a href="#refresh"><i class="icon-repeat"></i></a>
								</li>
								<li>
                                    <a href="#">
										<span class="header">
											<span class="title">iOS Development</span>
											<span class="percent"></span>
										</span>
                                        <div class="taskProgress progressSlim red">80</div> 
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
										<span class="header">
											<span class="title">Android Development</span>
											<span class="percent"></span>
										</span>
                                        <div class="taskProgress progressSlim green">47</div> 
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
										<span class="header">
											<span class="title">Django Project For Google</span>
											<span class="percent"></span>
										</span>
                                        <div class="taskProgress progressSlim yellow">32</div> 
                                    </a>
                                </li>
								<li>
                                    <a href="#">
										<span class="header">
											<span class="title">SEO for new sites</span>
											<span class="percent"></span>
										</span>
                                        <div class="taskProgress progressSlim greenLight">63</div> 
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
										<span class="header">
											<span class="title">New blog posts</span>
											<span class="percent"></span>
										</span>
                                        <div class="taskProgress progressSlim orange">80</div> 
                                    </a>
                                </li>
								<li>
                            		<a class="dropdown-menu-sub-footer">View all tasks</a>
								</li>	
							</ul>
						</li>
						<!-- end: Notifications Dropdown -->
						<!-- start: Message Dropdown -->
						<li class="dropdown hidden-phone">
							<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
								<i class="halflings-icon white envelope"></i>
							</a>
							<ul class="dropdown-menu messages">
								<li class="dropdown-menu-title">
 									<span>You have 9 messages</span>
									<a href="#refresh"><i class="icon-repeat"></i></a>
								</li>	
                            	<li>
                                    <a href="#">
										<span class="avatar"><img src="{{asset('backend/')}}/img/avatar.jpg" alt="Avatar"></span>
										<span class="header">
											<span class="from">
										    	Łukasz Holeczek
										     </span>
											<span class="time">
										    	6 min
										    </span>
										</span>
                                        <span class="message">
                                            Lorem ipsum dolor sit amet consectetur adipiscing elit, et al commore
                                        </span>  
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
										<span class="avatar"><img src="{{asset('backend/')}}/img/avatar2.jpg" alt="Avatar"></span>
										<span class="header">
											<span class="from">
										    	Megan Abott
										     </span>
											<span class="time">
										    	56 min
										    </span>
										</span>
                                        <span class="message">
                                            Lorem ipsum dolor sit amet consectetur adipiscing elit, et al commore
                                        </span>  
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
										<span class="avatar"><img src="{{asset('backend/')}}/img/avatar3.jpg" alt="Avatar"></span>
										<span class="header">
											<span class="from">
										    	Kate Ross
										     </span>
											<span class="time">
										    	3 hours
										    </span>
										</span>
                                        <span class="message">
                                            Lorem ipsum dolor sit amet consectetur adipiscing elit, et al commore
                                        </span>  
                                    </a>
                                </li>
								<li>
                                    <a href="#">
										<span class="avatar"><img src="{{asset('backend/')}}/img/avatar4.jpg" alt="Avatar"></span>
										<span class="header">
											<span class="from">
										    	Julie Blank
										     </span>
											<span class="time">
										    	yesterday
										    </span>
										</span>
                                        <span class="message">
                                            Lorem ipsum dolor sit amet consectetur adipiscing elit, et al commore
                                        </span>  
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
										<span class="avatar"><img src="{{asset('backend/')}}/img/avatar5.jpg" alt="Avatar"></span>
										<span class="header">
											<span class="from">
										    	Jane Sanders
										     </span>
											<span class="time">
										    	Jul 25, 2012
										    </span>
										</span>
                                        <span class="message">
                                            Lorem ipsum dolor sit amet consectetur adipiscing elit, et al commore
                                        </span>  
                                    </a>
                                </li>
								<li>
                            		<a class="dropdown-menu-sub-footer">View all messages</a>
								</li>	
							</ul>
						</li>
						<!-- end: Message Dropdown -->
						<li>
							<a class="btn" href="#">
								<i class="halflings-icon white wrench"></i>
							</a>
						</li>
						<!-- start: User Dropdown -->
						<li class="dropdown">
							<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
								<i class="halflings-icon white user"></i> habib
								<span class="caret"></span>
							</a>
							<ul class="dropdown-menu">
								<li class="dropdown-menu-title">
 									<span>Account Settings</span>
								</li>
								<li><a href="#"><i class="halflings-icon user"></i> Profile</a></li>
								<li><router-link to="/logout"><i class="halflings-icon off"></i> Logout</router-link></li>
							</ul>
						</li>
						<!-- end: User Dropdown -->
					</ul>
				</div>
				<!-- end: Header Menu -->
				
			</div>
		</div>
	</div>
	<!-- start: Header -->
	
		<div class="container-fluid-full">
		<div class="row-fluid">
				
			<!-- start: Main Menu -->
			<div id="sidebar-left" class="span2" style="display: none;" v-show="$route.path === '/' || $route.path === '/forgetpassword' ? false : true" >
				<div class="nav-collapse sidebar-nav">
					<ul class="nav nav-tabs nav-stacked main-menu">
						<li><router-link to="/dashboard"><i class="icon-bar-chart"></i><span class="hidden-tablet"> Dashboard</span></router-link></li>	
						
						<li>
							<a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet"> Employee</span></a>
							<ul>
								<li><router-link class="submenu" to="/add-employee"><i class="icon-plus-sign"></i><span class="hidden-tablet"> Add Employee</span></router-link></li>
								<li><router-link class="submenu" to="/all-employee"><i class="icon-medkit"></i><span class="hidden-tablet"> All Employee</span></router-link></li>
								
							</ul>	
						</li>
						<li>
							<a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet"> Supplier</span></a>
							<ul>
								<li><router-link class="submenu" to="/add-supplier"><i class="icon-plus-sign"></i><span class="hidden-tablet"> Add Supplier</span></router-link></li>
								<li><router-link class="submenu" to="/all-supplier"><i class="icon-medkit"></i><span class="hidden-tablet"> All Supplier</span></router-link></li>
								
							</ul>	
						</li>
						<li>
							<a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet"> Category</span></a>
							<ul>
								<li><router-link class="submenu" to="/add-category"><i class="icon-plus-sign"></i><span class="hidden-tablet"> Add Category</span></router-link></li>
								<li><router-link class="submenu" to="/all-category"><i class="icon-medkit"></i><span class="hidden-tablet"> All Category</span></router-link></li>
								
							</ul>	
						</li>
						<li>
							<a class="dropmenu" href="#"><i class="icon-user-md"></i><span class="hidden-tablet"> Customer</span></a>
							<ul>
								<li><router-link class="submenu" to="/add-customer"><i class="icon-plus-sign"></i><span class="hidden-tablet"> Add Customer</span></router-link></li>
								<li><router-link class="submenu" to="/all-customer"><i class="icon-medkit"></i><span class="hidden-tablet"> All Customer</span></router-link></li>
								
							</ul>	
						</li>
						<li>
							<a class="dropmenu" href="#"><i class="icon-user-md"></i><span class="hidden-tablet"> Products</span></a>
							<ul>
								<li><router-link class="submenu" to="/add-product"><i class="icon-plus-sign"></i><span class="hidden-tablet"> Add Product</span></router-link></li>
								<li><router-link class="submenu" to="/all-product"><i class="icon-medkit"></i><span class="hidden-tablet"> All Product</span></router-link></li>
								
							</ul>	
						</li>
						<li>
							<a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet"> Users</span></a>
							<ul>
								<li><router-link class="submenu" to="/register"><i class="icon-plus-sign"></i><span class="hidden-tablet"> Add User</span></router-link></li>
								<li><router-link class="submenu" to="/all-user"><i class="icon-medkit"></i><span class="hidden-tablet"> All User</span></router-link></li>
								
							</ul>	
						</li>
						<li><router-link to="/logout"><i class="icon-off"></i><span class="hidden-tablet"> Logout</span></router-link></li>
					</ul>
				</div>
			</div>
			<!-- end: Main Menu -->
			
			<noscript>
				<div class="alert alert-block span10">
					<h4 class="alert-heading">Warning!</h4>
					<p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
				</div>
			</noscript>
			
			<!-- start: Content -->
			<div id="content" class="span10">
				<router-view></router-view>
	</div><!--/.fluid-container-->
	
			<!-- end: Content -->
		</div><!--/#content.span10-->
		</div><!--/fluid-row-->
		
	<div class="modal hide fade" id="myModal">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">×</button>
			<h3>Settings</h3>
		</div>
		<div class="modal-body">
			<p>Here settings can be configured...</p>
		</div>
		<div class="modal-footer">
			<a href="#" class="btn" data-dismiss="modal">Close</a>
			<a href="#" class="btn btn-primary">Save changes</a>
		</div>
	</div>
	
	<div class="clearfix"></div>
	
	<footer id="footer" style="display: none;" v-show="$route.path === '/' || $route.path === 'forgetpassword' ? false : true">

		<p>
			<span style="text-align:left;float:left;font-weight:bold">&copy; <script>document.write(new Date().getFullYear())</script> <a href="https://www.fiverr.com/users/mdhabib058/manage_gigs" alt="Inventory Management System Themes" style="color: #FFFFFF;font-weight:bold">- Inventory Management System</a></span>
			<span class="hidden-phone" style="text-align:right;float:right;font-weight:bold">Powered by : <a href="https://www.fiverr.com/users/mdhabib058/manage_gigs" alt="Inventory Management System Templates" style="color: #FFFFFF;font-weight:bold">Dev-Habib</a></span>
		</p>

	</footer>
	
	<!-- start: JavaScript-->
	</div>
	
	<script src="{{ asset('/js/app.js') }}"></script>

		<script src="{{asset('backend/')}}/js/jquery-1.9.1.min.js"></script>
		
	<script src="{{asset('backend/')}}/js/jquery-migrate-1.0.0.min.js"></script>
	
		<script src="{{asset('backend/')}}/js/jquery-ui-1.10.0.custom.min.js"></script>
	
		<script src="{{asset('backend/')}}/js/jquery.ui.touch-punch.js"></script>
	
		<script src="{{asset('backend/')}}/js/modernizr.js"></script>
	
		<script src="{{asset('backend/')}}/js/bootstrap.min.js"></script>
	
		<script src="{{asset('backend/')}}/js/jquery.cookie.js"></script>
	
		<script src='{{asset('backend/')}}/js/fullcalendar.min.js'></script>
	
		<script src='{{asset('backend/')}}/js/jquery.dataTables.min.js'></script>

		<script src="{{asset('backend/')}}/js/excanvas.js"></script>
	<script src="{{asset('backend/')}}/js/jquery.flot.js"></script>
	<script src="{{asset('backend/')}}/js/jquery.flot.pie.js"></script>
	<script src="{{asset('backend/')}}/js/jquery.flot.stack.js"></script>
	<script src="{{asset('backend/')}}/js/jquery.flot.resize.min.js"></script>
	
		<script src="{{asset('backend/')}}/js/jquery.chosen.min.js"></script>
	
		<script src="{{asset('backend/')}}/js/jquery.uniform.min.js"></script>
		
		<script src="{{asset('backend/')}}/js/jquery.cleditor.min.js"></script>
	
		<script src="{{asset('backend/')}}/js/jquery.noty.js"></script>
	
		<script src="{{asset('backend/')}}/js/jquery.elfinder.min.js"></script>
	
		<script src="{{asset('backend/')}}/js/jquery.raty.min.js"></script>
	
		<script src="{{asset('backend/')}}/js/jquery.iphone.toggle.js"></script>
	
		<script src="{{asset('backend/')}}/js/jquery.uploadify-3.1.min.js"></script>
	
		<script src="{{asset('backend/')}}/js/jquery.gritter.min.js"></script>
	
		<script src="{{asset('backend/')}}/js/jquery.imagesloaded.js"></script>
	
		<script src="{{asset('backend/')}}/js/jquery.masonry.min.js"></script>
	
		<script src="{{asset('backend/')}}/js/jquery.knob.modified.js"></script>
	
		<script src="{{asset('backend/')}}/js/jquery.sparkline.min.js"></script>
	
		<script src="{{asset('backend/')}}/js/counter.js"></script>
	
		<script src="{{asset('backend/')}}/js/retina.js"></script>
		
		<script src="{{asset('backend/')}}/js/custom.js"></script>
	<!-- end: JavaScript-->
	<script type="text/javascript">
				let token = localStorage.getItem("token");
				if(token){
					$("#navbar").css("display","");
					$("#sidebar-left").css("display","");
					
					$("#footer").css("display","");
				}
				
	</script>
</body>

<!-- Mirrored from bootstrapmaster.com/live/metro/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Jan 2018 16:56:47 GMT -->
</html>
