<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>
	<script>
    $(document).ready(function(){
        function PopToast(txt)
        {
          Materialize.toast(txt, 3000, 'white rounded black-text');
        }
        var text = "<?php echo $mytext?>";
        PopToast(text);
    });
    </script>
</html>