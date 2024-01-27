<section class="menu-section">
        <div class="container">
            <div class="row ">
                <div class="col-md-12">
                    Browse By
                    <div class="navbar-collapse collapse ">
                        <ul id="menu-top" class="nav navbar-nav navbar-left">          
                            <li>
                                <a href="dashboard.php" class="dropdown-toggle" id="ddlmenuItem"> All </a>
                            </li>                 
                            <li>
                                <a href="#" class="dropdown-toggle" id="ddlmenuItem" data-toggle="dropdown"> Categories <i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu" role="menu" aria-labelledby="ddlmenuItem">
                                <?php $Results=getAllCategory();
                                    foreach($Results as $result) { ?>
                                           <li role="presentation"><a role="menuitem" tabindex="-1" href="browseby.php?type=category&id=<?php echo $result->id; ?>"><?php echo htmlentities(getCategory($result->id)); ?></a></li>
                                        <?php } ?>
                                    </ul>
                            </li>
                            <li>
                                <a href="#" class="dropdown-toggle" id="ddlmenuItem" data-toggle="dropdown"> Publishers <i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu" role="menu" aria-labelledby="ddlmenuItem">
                                <?php $Results=getAllPublisher();
                                    foreach($Results as $result) { ?>
                                           <li role="presentation"><a role="menuitem" tabindex="-1" href="browseby.php?type=publisher&id=<?php echo $result->id; ?>"><?php echo htmlentities(getPublisher($result->id)); ?></a></li>
                                        <?php } ?>
                                </ul>
                            </li>
                            <li>
                                <a href="#" class="dropdown-toggle" id="ddlmenuItem" data-toggle="dropdown"> Authors <i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu" role="menu" aria-labelledby="ddlmenuItem">
                                <?php $Results=getAllAuthor();
                                    foreach($Results as $result) { ?>
                                           <li role="presentation"><a role="menuitem" tabindex="-1" href="browseby.php?type=author&id=<?php echo $result->id; ?>"><?php echo htmlentities(getAuthor($result->id)); ?></a></li>
                                        <?php } ?>
                                </ul>
                            </li>
 <li>
                                <a href="#" class="dropdown-toggle" id="ddlmenuItem" data-toggle="dropdown"> Condition <i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu" role="menu" aria-labelledby="ddlmenuItem">
                                <?php $Results=getAllCondition();
                                    foreach($Results as $result) { ?>
                                           <li role="presentation"><a role="menuitem" tabindex="-1" href="browseby.php?type=condition&id=<?php echo $result->id; ?>"><?php echo htmlentities(getCondition($result->id)); ?></a></li>
                                        <?php } ?>

                                </ul>
                            </li>
                           <li>
                                <a href="#" class="dropdown-toggle" id="ddlmenuItem" data-toggle="dropdown"> Status <i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu" role="menu" aria-labelledby="ddlmenuItem">
                                <?php $Results=getAllStatus();
                                    foreach($Results as $result) { ?>
                                           <li role="presentation"><a role="menuitem" tabindex="-1" href="browseby.php?type=status&id=<?php echo $result->id; ?>"><?php echo htmlentities(getStatus($result->id)); ?></a></li>
                                        <?php } ?>

                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>