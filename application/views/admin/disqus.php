<!DOCTYPE html>
<html>
<head>
<!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?=base_url('assets/');?>bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?=base_url('assets/');?>plugins/line_control_editor/editor.css">


</head>
<body>
	
                        <textarea name="body" class="form-control txteditor" id="post_body" placeholder="Body" rows="10"><?php echo set_value('body');?></textarea>
                    
                        <label for="post_status">Featured Image</label>
                        <input type="hidden" name="featured_image" value="<?php echo set_value('featured_image');?>" id="featured_image">
                        <div class="preview_featured_image"></div>
                        <div class="set_featured_image">
                            <a type="button" style="cursor:pointer" class="btnShowAssets" data-toggle="modal" data-target="#assetsModal">Set Featured Image</a>
                        </div>
<script>

/**
*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
/*
var disqus_config = function () {
this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
};
*/
(function() { // DON'T EDIT BELOW THIS LINE
var d = document, s = d.createElement('script');
s.src = '//tvkunet.disqus.com/embed.js';
s.setAttribute('data-timestamp', +new Date());
(d.head || d.body).appendChild(s);
})();
</script>

<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                                
<script id="dsq-count-scr" src="//tvkunet.disqus.com/count.js" async></script>
<a href="http://foo.com/bar.html#disqus_thread">Link</a>


<!-- jQuery 2.2.3 -->
<script src="<?=base_url('assets/');?>plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?=base_url('assets/');?>bootstrap/js/bootstrap.min.js"></script>

<!-- Line Control WYSIWYG -->
<script src="<?php echo base_url();?>assets/plugins/line_control_editor/editor.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $("button:submit").click(function(){
        $('.txteditor').text($('.txteditor').Editor("getText"));
    });

    var editor = $(".txteditor").Editor();
    $('.txteditor').Editor("setText", "<?php echo !empty($post['body']) ? addslashes($post['body']) :'';?>");        
})
    
</script>

</body>
</html>