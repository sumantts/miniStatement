<div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link">
                <div class="profile-image">
                  <img class="img-xs rounded-circle" src="<?=$small_logo?>" alt="profile image">
                  <div class="dot-indicator bg-success"></div>
                </div>
                <div class="text-wrapper">
                  <p class="profile-name"> Customer Name</p>
                  <!--<p class="designation">Premium user</p>-->
                </div>
              </a>
            </li>
            <!--<li class="nav-item nav-category">Main Menu</li>-->
            <li class="nav-item">
              <a class="nav-link" href="?p=dashboard">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title">Account statement</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">User Page</span>
                <i class="menu-arrow"></i>
              </a>
              <div <?php if($p == 'change_password'){?>class="collapse show"<?php }else{?>class="collapse"<?php } ?> id="ui-basic">
                <ul class="nav flex-column sub-menu">                
                  
                  
                  <li class="nav-item">
                    <a class="nav-link" href="?p=login&out=ok">Log Out</a>
                  </li>
                </ul>
              </div>
            </li>
            <!--
            
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">Loan</span>
                <i class="menu-arrow"></i>
              </a>
              <div <?php if($p == 'loan_payment' || $p == 'loan_collection'){?>class="collapse show"<?php }else{?>class="collapse"<?php } ?> id="ui-basic">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="?p=loan_payment">Payment</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="?p=loan_collection">Collection</a>
                  </li>
                </ul>
              </div>
            </li>
			      <li class="nav-item">
              <a class="nav-link" href="?p=mem_collection">
                <i class="menu-icon typcn typcn-shopping-bag"></i>
                <span class="menu-title">View Receipt</span>
              </a>
            </li>
			      <li class="nav-item">
              <a class="nav-link" href="?p=update_password">
                <i class="menu-icon typcn typcn-shopping-bag"></i>
                <span class="menu-title">Change Password</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="?p=login&out=ok">
                <i class="menu-icon typcn typcn-shopping-bag"></i>
                <span class="menu-title">Sign Out</span>
              </a>
            </li>
            --->
          </ul>
        </nav>