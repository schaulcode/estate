<nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="navbar-header">
               <button class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">CMS Admin</a>
            </div>
            <ul class="nav navbar-right top-nav">
                <li><a href="../index.php">Website</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php // echo $_SESSION['firstname']?> Scholi <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="profile.php"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>

                        <li class="divider"></li>
                        <li>
                            <a href="include/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav side-nav">
                   <li>
                       <a href="index.php"><i></i> Dashboard</a>
                   </li>
                   <li>
                       <a href="javascript:;" data-toggle="collapse" data-target="#to_buy"><i></i> Properties to buy</a>
                       <ul class="collapse" id="to_buy">
                           <li>
                           <a href="all_properties_buy.php">View All</a>
                           </li>
                           <li>
                           <a href="new_properties_buy.php">Add New</a>
                           </li>
                       </ul>
                   </li>
                   <li>
                      <a href="javascript:;" data-toggle="collapse" data-target="#to_rent"><i></i> Properties to rent</a>
                       <ul class="collapse" id="to_rent">
                           <li>
                           <a href="all_properties_rent.php">View All</a>
                           </li>
                           <li>
                           <a href="new_properties_rent.php">Add New</a>
                           </li>
                       </ul>
                   </li>
                   <li><a href=""><i></i>Advertisers</a></li>
                   <li><a href="user.php"><i></i>Users</a></li>
                </ul>
            </div>
        </nav>
