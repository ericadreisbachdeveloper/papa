<nav id="nav" class="section fixed">

  <a href="#maincontent" class="hidden">Skip Navigation </a>

  <div class="wrapper">
    <div id="brend"><a class="link" href="<?php if(isset($page)){ echo './'; } else {} ?>"><img src="img/logo.svg" alt="" title="" class="logo" />ericadreisbach</a></div>

    <div class="navbutton">
      <div class="white"> </div>
      <div class="white"> </div>
      <div class="white"> </div>
    </div>

    <ul class="nav">
      <li class="location haschildren"><a class="link" aria-haspopup="true" href="<?php if(isset($page)){ echo './'; } else {} ?>#work">work </a>
        <ul class="subnav -work">
          <li class="location"><a class="link<?php if(isset($page) && $page == 'Sentegrity'):?> current<?php endif;?>" href="sentegrity.php">Sentegrity </a></li>
         <li class="location"><a class="link<?php if(isset($page) && $page == 'Educare'):?> current<?php endif;?>" href="educare.php">Educare </a></li>
         <li class="location"><a class="link<?php if(isset($page) && $page == 'PortionPac'):?> current<?php endif;?>" href="portionpac.php">PortionPac </a></li>
         <li class="location"><a class="link<?php if(isset($page) && $page == 'WellTrail'):?> current<?php endif;?>" href="welltrail.php">WellTrail </a></li>
         <li class="location"><a class="link<?php if(isset($page) && $page == 'Savory Living'):?> current<?php endif;?>" href="savory.php">Savory Living </a></li>
         <li class="location"><a class="link<?php if(isset($page) && $page == 'Nearby Registry'):?> current<?php endif;?>" href="nearby.php">Nearby Registry </a></li>
         <li class="location"><a class="link<?php if(isset($page) && $page == 'Sugar Glen Farm'):?> current<?php endif;?>" href="sugarglen.php">Sugar Glen Farm </a></li>
         <li class="location"><a class="link<?php if(isset($page) && $page == 'Government Energy Management'):?> current<?php endif;?>" href="gem.php">Gov't Energy Management </a></li>
        </ul>
      </li>

      <li class="location haschildren"><a class="link" href="<?php if(isset($page)){ echo './'; } else {} ?>#about">about </a>
        <ul class="subnav">
          <li class="location"><a class="link<?php if(isset($page) && $page == 'How I Work'):?> current<?php endif;?>" href="how-i-work.php">How I Work </a></li>
          <li class="location"><a class="link<?php if(isset($page) && $page == 'Testimonials'):?> current<?php endif;?>" href="testimonials.php">Testimonials </a></li>
        </ul>
      </li>

      <li class="location"><a class="link" href="<?php if(isset($page)){ echo './'; } else {} ?>#skills">skills </a></li>
      <li class="location"><a class="link" href="<?php if(isset($page)){ echo './'; } else {} ?>#contact">contact </a></li>
    </ul>

  </div>
</nav>
