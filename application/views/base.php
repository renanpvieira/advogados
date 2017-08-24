<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" ></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.6.8-fix/jquery.nicescroll.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/script-base.js'); ?>" ></script>

<?php
     if(isset($scriptsJs))
     {
       foreach($scriptsJs as $js)
       {
          echo '<script type="text/javascript" src="' . base_url('assets/js/' . $js)  . '"></script>';
       }
     }
?>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBGwuKbCfmuR1zT9Onwa35bZOyReQMAt20&callback=iniciaMapa" async defer></script>


</body>
</html>
