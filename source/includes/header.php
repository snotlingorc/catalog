<div class="navbar navbar-inverse set-radius-zero" >
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" >

                    <img src="/catalog/assets/img/sign.png" style="width:180px;height:80px;"/>
                </a>

            </div>
<?php if($_SESSION['login']) { ?> 
            <div class="right-div">
                <a href="/catalog/logout.php" class="btn btn-danger pull-right">LOG ME OUT</a>
            </div>
            <?php }?>
        </div>
    </div>
    <!-- LOGO HEADER END-->
<?php if($_SESSION['login']) { ?>    
<section class="menu-section">
        <div class="container">
            <div class="row ">
                <div class="col-md-12">
                    <div class="navbar-collapse collapse ">
                        <ul id="menu-top" class="nav navbar-nav navbar-right">
                            <li><a href="/catalog/dashboard.php" class="menu-top-active">DASHBOARD</a></li>
                            <li><a href="#" class="dropdown-toggle" id="ddlmenuItem" data-toggle="dropdown"> Account <i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu" role="menu" aria-labelledby="ddlmenuItem">
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="my-profile.php">My Profile</a></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="change-password.php">Change Password</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <?php } else { ?>
        <section class="menu-section">
        <div class="container">
            <div class="row ">
                <div class="col-md-12">
                    <div class="navbar-collapse collapse ">
                        <ul id="menu-top" class="nav navbar-nav navbar-right">                        
                            <li><a href="/catalog/adminlogin.php">Admin Login</a></li>
                            <li><a href="/catalog/signup.php">User Signup</a></li>
                            <li><a href="/catalog/index.php">User Login</a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <?php } ?>