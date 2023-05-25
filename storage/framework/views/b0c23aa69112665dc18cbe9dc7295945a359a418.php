<div class="page-main-header">
  <div class="main-header-right row m-0">
    <div class="main-header-left">
      <div class="logo-wrapper"><a href="<?php echo e(route('admin')); ?>"><img class="img-fluid" src="<?php echo e(asset('assets/images/logo/logo.png')); ?>" alt=""></a></div>
      <div class="dark-logo-wrapper"><a href="<?php echo e(route('admin')); ?>"><img class="img-fluid" src="<?php echo e(asset('assets/images/logo/dark-logo.png')); ?>" alt=""></a></div>
      <div class="toggle-sidebar"><i class="status_toggle middle" data-feather="align-center" id="sidebar-toggle">    </i></div>
    </div>
    <div class="left-menu-header col">
      <ul>
        <li>
          <form class="form-inline search-form">
            <div class="search-bg"><i class="fa fa-search"></i>
              <input class="form-control-plaintext" placeholder="Search here.....">
            </div>
          </form>
          <span class="d-sm-none mobile-search search-bg"><i class="fa fa-search"></i></span>
        </li>
      </ul>
    </div>
    <div class="nav-right col pull-right right-menu p-0">
      <ul class="nav-menus">
        <li><a class="text-dark" href="#!" onclick="javascript:toggleFullScreen()"><i data-feather="maximize"></i></a></li>
        <li class="onhover-dropdown">
          <div class="notification-box"><i data-feather="bell"></i><span class="dot-animated"></span></div>
          <ul class="notification-dropdown onhover-show-div">
            <li>
              <p class="f-w-700 mb-0">You have <?php echo e($notifications->count()); ?> Notifications<span class="pull-right badge badge-primary badge-pill"><?php echo e($notifications->count()); ?></span></p>
            </li>
             <?php $__currentLoopData = $notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="noti-primary">
              <div class="media">
                <span class="notification-bg bg-light-primary"><i data-feather="activity"> </i></span>
                <div class="media-body">
                  <p><?php echo e($notification->value_ar); ?> </p>
                  <span><?php echo e($notification->created_at); ?></span>
                </div>
              </div>
            </li>
           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </ul>
        </li>
        <li>
            <div class="mode"><i class="fa fa-moon-o"></i></div>
        </li>
        <li class="onhover-dropdown">
          <i data-feather="message-square"></i>
           <ul class="chat-dropdown onhover-show-div">
               <?php $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $massege): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
           <li>
                <a href=<?php echo e(route('massege.show',$massege->id)); ?>>
              <div class="media">
                <img class="img-fluid rounded-circle me-3" src="<?php echo e(asset('assets/images/user/4.jpg')); ?>" alt="">
                <div class="media-body">
                  <span><?php echo e($massege->name); ?></span>
                  <p class="f-12 light-font"><?php echo e($massege->massege); ?></p>
                </div>
                <p class="f-12"><?php echo e($massege->created_at); ?></p>
              </div>
              </a>
            </li>
           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <li class="text-center"> <a class="f-w-700" href="<?php echo e(route('messages')); ?>">See All</a></li>
          </ul>
        
        </li>
        <li class="onhover-dropdown p-0">
          <a href="<?php echo e(route('logout')); ?>"><button class="btn btn-primary-light" type="button"><i data-feather="log-out"></i>Log out</button></a>
        </li>
      </ul>
    </div>
    <div class="d-lg-none mobile-toggle pull-right w-auto"><i data-feather="more-horizontal"></i></div>
  </div>
</div>
<?php /**PATH /home/frdaysq/public_html/resources/views/layouts/default-layout/partials/header.blade.php ENDPATH**/ ?>