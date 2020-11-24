<?php
   require 'view/defaultTop.php';
?>


<div class="container asap-regular px-0">
   <?php

      require 'view/home.php';

      require 'view/contentText.php';
      require 'view/mailContact.php';

   ?>

</div>


<div class="container-fluid asap-regular bg-blue px-0">
   <footer>
      <?php

         require 'view/footer.php';

         require 'copyright.php';

      ?>
   </footer>
</div>



<?php
   require 'view/defaultBottom.php';
?>