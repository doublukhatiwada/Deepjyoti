
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <h3>General</h3>
        <ul class="nav side-menu">
            <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="../form/addMessage.php?edit=<?php echo $_SESSION['company_id']?>">Message</a></li>
                    
                </ul>
            </li>
            <li><a><i class="fa fa-home"></i> Form <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                   <li> <?php if($_SESSION['company_id'] == 1):?><a href="../form/addusers.php"> Add Users</a><?php endif;?></li>
                    <li><?php if($_SESSION['company_id'] == 1):?><a href="../form/addCompany.php"> Add Company</a><?php endif;?></li>
                    <li><?php if($_SESSION['company_id'] != 1):?><a href="../form/addTeam.php">Add Team</a><?php endif;?></li>
                <li><?php if($_SESSION['company_id'] != 1):?><a href="../form/addDocuments.php">Add Document</a><?php endif;?></li>
            <li><?php if($_SESSION['company_id'] != 1):?><a href="../form/addClient.php"> Add Client's Review</a><?php endif;?></li>
            <li><?php if($_SESSION['company_id'] != 1):?><a href="../form/addFeature.php"> Add Feature</a><?php endif;?></li>
                </ul>
            </li>
            
            <li><a><i class="fa fa-edit"></i> Lists <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                <li><?php if($_SESSION['company_id'] == 1):?><a href="../table/listUsers.php">Users</a><?php endif;?></li>
            <li><?php if($_SESSION['company_id'] == 1):?><a href="../table/listCompany.php">Companies</a><?php endif;?></li>
                <li> <?php if($_SESSION['company_id'] != 1):?><a href="../table/listTeams.php">Teams</a><?php endif;?></li>
        <li><?php if($_SESSION['company_id'] != 1):?><a href="../table/listDocuments.php">Documents</a><?php endif;?></li>
            <li><?php if($_SESSION['company_id'] != 1):?><a href="../table/listClients.php">Client's Reviews</a><?php endif;?></li>
            <li><?php if($_SESSION['company_id'] != 1):?><a href="../table/listFeatures.php">Features</a><?php endif;?></li>
                </ul>
            </li>

    </div>


</div>
    <div class="sidebar-footer hidden-small">
        <a data-toggle="tooltip" data-placement="top" title="Settings">
            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="FullScreen">
            <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="Lock">
            <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="Logout" href="../logout.php">
            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
        </a>
    </div>