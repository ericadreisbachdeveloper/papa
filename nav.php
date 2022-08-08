<?php global $home; global $bodyclass; ?>



<?php if(isset($page)) { $homedir = '../'; } else { $homedir = ''; } ?>



<?php if(isset($page)) : ?>
<nav class="navbar navbar-default navbar-affix-top">
<?php else :?>
<nav class="navbar navbar-default" data-spy="affix" data-offset-top="">
<?php endif; ?>



  <div class="nav-container">


    <div class="navbar-header">


      <a class="navbar-brand" href="<?php echo $homedir; ?>">
        <img class="navbar-logo" src="https://s3.amazonaws.com/darkblack-papa/logo-v1.1.0.svg" alt="logo for Erica Dreisbach | freelance Chicago web developer" title="Erica Dreisbach | Chicago Web Developer" />
        <span class="navbar-name">ericadreisbach</span>
      </a>


      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navmenu" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar -top"></span>
        <span class="icon-bar -middle"></span>
        <span class="icon-bar -bottom"></span>
      </button>


    </div>


    <div class="collapse navbar-collapse" id="navmenu">
      <ul class="nav navbar-nav navbar-right">


        <li class="nav-li dropdown <?php if($bodyclass == 'work') { echo 'active'; } ?>">


          <a href="#" class="nav-a" data-toggle="dropdown"  role="button" aria-haspopup="true" aria-expanded="false">
            <span>Work</span>
            <span class="caret"></span>
          </a>


          <ul class="dropdown-menu">
            <li class="dropdown-li <?php if($page == 'Howl2GO') { echo 'active'; }?>"><a href="<?php echo $homedir; ?>howl2go">Howl2GO</a></li>
            <li class="dropdown-li <?php if($page == 'Worsham') { echo 'active'; }?>"><a href="<?php echo $homedir; ?>worsham">Worsham </a></li>
            <li class="dropdown-li <?php if($page == 'Onicia Muller') { echo 'active'; }?>"><a href="<?php echo $homedir; ?>oniciamuller">Onicia Muller </a></li>
            <li class="dropdown-li <?php if($page == 'Odea') { echo 'active'; }?>"><a href="<?php echo $homedir; ?>odea">Odea </a></li>
            <li class="dropdown-li <?php if($page == 'Educare') { echo 'active'; }?>"><a href="<?php echo $homedir; ?>educare">Educare </a></li>
            <li class="dropdown-li <?php if($page == 'Space to Grow') { echo 'active'; }?>"><a href="<?php echo $homedir; ?>spacetogrow">Space to Grow </a></li>
            <li class="dropdown-li <?php if($page == 'WellTrail') { echo 'active'; }?>"><a href="<?php echo $homedir; ?>welltrail">WellTrail </a></li>
            <li class="dropdown-li <?php if($page == 'Government Energy Management') { echo 'active'; }?>"><a href="<?php echo $homedir; ?>gem">Government Energy Management </a></li>
          </ul>
        </li>


        <li class="nav-li"><a class="nav-a" href="<?php echo $homedir; ?>#about">About </a>
          <ul class="hidden">
            <li><a href="<?php echo $homedir; ?>how-i-work">How I Work </a></li>
            <li><a href="<?php echo $homedir; ?>testimonials">Testimonials </a></li>
          </ul>
        </li>


        <li class="nav-li"><a class="nav-a" href="<?php echo $homedir; ?>#skills">Skills </a>
          <ul class="hidden">
            <li><a href="<?php echo $homedir; ?>pdf/ericadreisbach-resume.pdf">Resume (PDF)</a></li>
          </ul>
        </li>


        <li class="nav-li"><a class="nav-a" href="<?php echo $homedir; ?>#contact">Contact</a></li>


      </ul>



    </div><!-- /.navbar-collapse -->


  </div><!-- /.nav-container -->
</nav>
