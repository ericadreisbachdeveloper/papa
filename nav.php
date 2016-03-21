<nav id="nav" class="section" style="display: none;" role="navigation">

  <a href="#maincontent" class="hidden">Skip Navigation </a>

  <div class="wrapper">
    <div id="brend"><a class="link" href="<?php if(isset($page)){ echo './'; } else {} ?>"><img src="img/logo.svg" class="logo" />ericadreisbach</a></div>

    <div class="navbutton">
      <div class="white"> </div>
      <div class="white"> </div>
      <div class="white"> </div>
    </div>

    <ul class="nav">
      <li class="location haschildren"><a class="link" aria-haspopup="true" href="<?php if(isset($page)){ echo './'; } else {} ?>#work">work </a>
        <ul class="subnav -work">
          <li class="location"><a class="link<?php if(isset($page) && $page == 'Sentegrity'):?> current<?php endif;?>" href="sentegrity" class="current">Sentegrity </a></li>
         <li class="location"><a class="link<?php if(isset($page) && $page == 'Educare'):?> current<?php endif;?>" href="educare">Educare </a></li>
         <li class="location"><a class="link<?php if(isset($page) && $page == 'PortionPac'):?> current<?php endif;?>" href="portionpac">PortionPac </a></li>
         <li class="location"><a class="link<?php if(isset($page) && $page == 'WellTrail'):?> current<?php endif;?>" href="welltrail">WellTrail </a></li>
         <li class="location"><a class="link<?php if(isset($page) && $page == 'Savory Living'):?> current<?php endif;?>" href="savory">Savory Living </a></li>
         <li class="location"><a class="link<?php if(isset($page) && $page == 'Nearby Registry'):?> current<?php endif;?>" href="nearby">Nearby Registry </a></li>
         <li class="location"><a class="link<?php if(isset($page) && $page == 'Sugar Glen Farm'):?> current<?php endif;?>" href="sugarglen">Sugar Glen Farm </a></li>
         <li class="location"><a class="link<?php if(isset($page) && $page == 'Government Energy Management'):?> current<?php endif;?>" href="gem">Gov't Energy Management </a></li>
        </ul>
      </li>

      <li class="location haschildren"><a class="link" href="<?php if(isset($page)){ echo './'; } else {} ?>#about">about </a>
        <ul class="subnav">
          <li class="location"><a class="link<?php if(isset($page) && $page == 'How I Work'):?> current<?php endif;?>" href="how-i-work">How I Work </a></li>
          <li class="location"><a class="link<?php if(isset($page) && $page == 'Testimonials'):?> current<?php endif;?>" href="testimonials">Testimonials </a></li>
        </ul>
      </li>

      <li class="location"><a class="link" href="<?php if(isset($page)){ echo './'; } else {} ?>#skills">skills </a></li>
      <li class="location"><a class="link" href="<?php if(isset($page)){ echo './'; } else {} ?>#contact">contact </a></li>
    </ul>

  </div>
</nav>
