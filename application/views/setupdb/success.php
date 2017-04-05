<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>
	<script type="text/javascript" src="/assets/js/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="/assets/js/materialize.js"></script>
	<script>
        function PopToast(txt)
        {
          Materialize.toast(txt, 3000, 'white rounded black-text');
        }
        var text = "<?php echo $mytext?>";
        PopToast(text);
    </script>
</html>