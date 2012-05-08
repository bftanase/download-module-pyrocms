<p> Thank you for trying Train My Ear!</p>
<p>Your download should start shortly, if not please try 
  <a href="<?php echo $download_url ?>" > this direct link </a> </p>

<p><b>If you like this software, please consider <a href="{{ url:site }}/support-tme">Supporting TME</a></b></p>

<script type="text/javascript">
  var downloadUrl = '<?php echo $download_url ?>';
  
  var timeoutFn = function(){
    window.location = downloadUrl;
  };
  
  setTimeout(timeoutFn, 2000);
</script>