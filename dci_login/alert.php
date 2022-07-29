<?php
        if(isset($_SESSION['msg'])) {
          echo '
          <div class="alert alert-'.$_SESSION['type'].' alert-dismissible text-center fade show" role="alert">
            <h4>'.$_SESSION['msg'].'</h4>
            <button type="button" class="close" data-dismiss="alert">&times;</button>
          </div>
          ';
          unset($_SESSION['msg']);
        }
        ?>