
<!-- CONTENT -->
<section class="content">
    <div class="container">
        <div class="row">
            <!-- Blog post-->
            <div class="post-content post-modern post-content-single col-md-9">
                <!-- Post item-->
                <div class="post-item">
                        <div class="post-title">
                            <h2><?=$konten->judul;?></h2>
                        </div>
                    <div class="post-image">
                        <a href="#">
                            <img alt="" src="<?=base_url('assets/');?>uploads/post/thumbnail/<?=$konten->thumbnail;?>">
                        </a>
                    </div>
                    <div class="post-content-details">
                        <div class="post-info">
                            <span class="post-autor">Post by: <a href="#">Alea Grande</a></span>
                            <span class="post-category">in <a href="#">Productivity</a></span>
                        </div>
                        <div class="post-description">
                            <?=$konten->isi;?>
                        </div>
                    </div>
                    <div class="post-meta">
                        <div class="post-date">
                            <span class="post-date-day"><?=date("d", strtotime($konten->modified));?></span>
                            <span class="post-date-month"><?=date("F", strtotime($konten->modified));?></span>
                            <span class="post-date-year"><?=date("Y", strtotime($konten->modified));?></span>
                        </div>

                        <div class="post-comments">
                            <a href="#">
                                <i class="fa fa-comments-o"></i>
                                <span class="post-comments-number">324</span>
                            </a>
                        </div>
                        <div class="post-comments">
                            <a href="#">
                                <i class="fa fa-share-alt"></i>
                                <span class="post-comments-number">324</span>
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Comments-->
                <div id="comments" class="comments">
                    <div class="heading">
                        <h4 class="comments-title">Comments <small class="number">(4)</small></h4>
                    </div>


                    <div class="comment">
                        <a href="#" class="pull-left">
                            <img alt="" src="images/team/1.jpg" class="avatar">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading">Alea Grande</h4>
                            <p class="time">Feb 25, 2015 at 9:30 PM</p>
                            <p>Maecenas nec iaculis turpis, eget congue massa. Ut ultrices consectetur eleifend. Nullam nisl dui, congue in mi non, dapibus adipiscing metus. Donec mollis semper rutrum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sed euismod neque. Aliquam eget malesuada enim, eu interdum elit. Sed sagittis ornare velit a congue.</p>
                            <a href="#" class="comment-reply pull-right"><i class="fa fa-reply"></i> Reply</a>
                        </div>
                    </div>

                    <div class="comment">
                        <a href="#" class="pull-left">
                            <img alt="" src="images/team/2.jpg" class="avatar">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading">Juna Smith</h4>
                            <p class="time">Jan 18, 2015 at 10:30 PM</p>
                            <p>Nullam nisl dui, congue in mi non, dapibus adipiscing metus. Donec mollis semper rutrum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sed euismod neque. Aliquam eget malesuada enim, eu interdum elit. Sed sagittis ornare velit a congue.</p>
                            <a href="#" class="comment-reply pull-right"><i class="fa fa-reply"></i> Reply</a>
                        </div>



                        <div class="comment comment-replied">
                            <a href="#" class="pull-left">
                                <img alt="" src="images/team/3.jpg" class="avatar">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">Ariol Smith</h4>
                                <p class="time">Jun 24, 2015 at 14:28 PM</p>
                                <p>Ut ultrices consectetur eleifend. Nullam nisl dui, congue in mi non, dapibus adipiscing metus. Donec mollis semper rutrum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sed euismod neque. Aliquam eget malesuada enim, eu interdum elit. Sed sagittis ornare velit a congue.</p>
                                <a href="#" class="comment-reply pull-right"><i class="fa fa-reply"></i> Reply</a>
                            </div>
                        </div>
                    </div>

                    <div class="comment">
                        <a href="#" class="pull-left">
                            <img alt="" src="images/team/4.jpg" class="avatar">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading">Dia Perry</h4>
                            <p class="time">Jun 24, 2015 at 14:28 PM</p>
                            <p>Donec mollis semper rutrum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sed euismod neque. Aliquam eget malesuada enim, eu interdum elit. Donec mollis semper rutrum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sed euismod neque. Aliquam eget malesuada enim, eu interdum elit. Sed sagittis ornare velit a congue. Sed sagittis ornare velit a congue. Maecenas nec iaculis turpis, eget congue massa. Ut ultrices consectetur eleifend. Nullam nisl dui, congue in mi non, dapibus adipiscing metus. </p>
                            <a href="#" class="comment-reply pull-right"><i class="fa fa-reply"></i> Reply</a>
                        </div>
                    </div>

                </div>
                <div class="comment-form">
                    <div class="heading">
                        <h4>Leave a comment</h4>
                    </div>
                    <form class="form-gray-fields">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name" class="upper">Your Name</label>
                                    <input type="text" aria-required="true" id="name" placeholder="Enter name" name="senderName" class="form-control required">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="email" class="upper">Your Email</label>
                                    <input type="email" aria-required="true" id="email" placeholder="Enter email" name="senderEmail" class="form-control required email">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="phone" class="upper">Your Phone</label>
                                    <input type="text" aria-required="true" id="phone" placeholder="Enter phone" name="phone" class="form-control required">
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="comment" class="upper">Your comment</label>
                                    <textarea aria-required="true" id="comment" placeholder="Enter comment" rows="9" name="comment" class="form-control required"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group text-center">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane"></i>&nbsp;Post comment</button>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
                <!-- END: Comments-->
            </div>
            <!-- END: Blog post-->

            <!-- Sidebar-->
            <div class="sidebar sidebar-modern col-md-3">
                <!--widget newsletter-->
                <div class="widget clearfix widget-newsletter">
                                <form id="widget-subscribe-form-sidebar" action="include/subscribe-form.php" role="form" method="post" class="form-inline">
                                    <h4 class="widget-title">Newsletter</h4>
                                    <small>Stay informed on our latest news!</small>
                                    <div class="input-group">
                                        <input type="email" aria-required="true" name="widget-subscribe-form-email" class="form-control required email" placeholder="Enter your Email">
                                        <span class="input-group-btn">
                  <button type="submit" id="widget-subscribe-submit-button" class="btn btn-primary"><i class="fa fa-paper-plane"></i></button>
                  </span> </div>
                                </form>
                                <script type="text/javascript">
                                    jQuery("#widget-subscribe-form-sidebar").validate({
                                        submitHandler: function(form) {
                                            jQuery(form).ajaxSubmit({
                                                dataType: 'json',
                                                success: function(text) {
                                                    if (text.response == 'success') {
                                                        $.notify({
                                                            message: "You have successfully subscribed to our mailing list."
                                                        }, {
                                                            type: 'success'
                                                        });
                                                        $(form)[0].reset();

                                                    } else {
                                                        $.notify({
                                                            message: text.message
                                                        }, {
                                                            type: 'warning'
                                                        });
                                                    }
                                                }
                                            });
                                        }
                                    });

                                </script>
                            </div>
                <!--end: widget newsletter-->

                <!--widget tweeter-->
                <div class="widget clearfix widget-tweeter">
                    <h4 class="widget-title">Recent Tweets</h4>
                    <ul class="list-tweets list-medium">
                        <li>I just closed a deal in 14 minutes on EchoSign eSignature solution <a href="https://t.co/LNw6ludJ3S">https://t.co/LNw6ludJ3S</a>
                            <span class="list-tweets-date">10 days ago</span>
                        </li>
                        <li>
                            I love Dropbox because Simple it is the best for saving all important files that worth! <a href="https://t.co/EQvlz88Xht ">https://t.co/EQvlz88Xht </a>
                            <span class="list-tweets-date">10 days ago</span>
                        </li>
                    </ul>
                </div>
                <!--end: widget tweeter-->

                <!--widget tags -->
                <div class="widget clearfix widget-tags">
                    <h4 class="widget-title">Tags</h4>
                    <div class="tags">
                        <a href="#">Design</a>
                        <a href="#">Portfolio</a>
                        <a href="#">Digital</a>
                        <a href="#">Branding</a>
                        <a href="#">HTML</a>
                        <a href="#">Clean</a>
                        <a href="#">Peace</a>
                        <a href="#">Love</a>
                        <a href="#">CSS3</a>
                        <a href="#">jQuery</a>
                    </div>
                </div>
                <!--end: widget tags -->
                <!--widget archive-->
                <div class="widget clearfix widget-archive">
                    <h4 class="widget-title">Archive</h4>
                    <ul class="list list-lines">
                        <li>Jun 2015 </li>
                        <li>May 2015 </li>
                        <li>Apr 2015 </li>
                        <li>Mar 2015 </li>
                    </ul>
                </div>
                <!--end: widget archive-->

                <!--widget flickr-->
                <div class="widget clearfix widget-flickr">
                    <h4 class="widget-title">Flickr feed</h4>
                    <div data-flickr-images="12" data-flickr-id="52617155@N08" class="flickr-widget"></div>
                </div>
                <!--end: widget flickr-->

                <!--widget blog articles-->
                <div class="widget clearfix widget-blog-articles">
                    <h4 class="widget-title">From our Blog</h4>
                    <ul class="list-posts list-medium">
                        <li><a href="#">Printing and typesetting</a>
                            <small>Jun 18 2015</small>
                        </li>
                        <li><a href="#">Lorem Ipsum has been the industry's</a><small>Jun 18 2015</small>
                        </li>
                        <li><a href="#">Ipsum and typesetting</a><small>Jun 18 2015</small>
                        </li>
                        <li><a href="#">Specimen book</a><small>Jun 18 2015</small>
                        </li>

                    </ul>
                </div>
                <!--end: widget blog articles-->

                <!--widget categories-->
                <div class="widget clearfix widget-categories">
                    <h4 class="widget-title">Our Services</h4>
                    <ul class="list list-arrow-icons">
                        <li> <a title="" href="#">Development </a> </li>
                        <li> <a title="" href="#">Branding </a> </li>
                        <li> <a title="" href="#">Marketing </a> </li>
                        <li> <a title="" href="#">Branding </a> </li>
                        <li> <a title="" href="#">Strategy solutions</a> </li>
                        <li> <a title="" href="#">Copywriting </a> </li>
                    </ul>
                </div>
                <!--end: widget categories-->

                <!--widget contact us-->
                <div class="widget clearfix widget-contact-us" style="background-image: url('images/world-map.png'); background-position: 50% 55px; background-repeat: no-repeat">
                    <h4 class="widget-title">Contact us</h4>
                    <ul class="list-large list-icons">
                        <li><i class="fa fa-map-marker"></i>
                            <strong>Address:</strong> 795 Folsom Ave, Suite 600
                            <br>San Francisco, CA 94107</li>
                        <li><i class="fa fa-phone"></i><strong>Phone:</strong> (123) 456-7890 </li>
                        <li><i class="fa fa-envelope"></i><strong>Email:</strong> <a href="mailto:first.last@example.com">first.last@example.com</a>
                        </li>
                        <li><i class="fa fa-clock-o"></i>Monday - Friday: <strong>08:00 - 22:00</strong>
                            <br>Saturday, Sunday: <strong>Closed</strong>
                        </li>
                    </ul>
                </div>
                <!--end: widget contact us-->

                <!--widget blockquote -->
                <div class="widget clearfix widget-blockquote">
                    <h4 class="widget-title">Blockquote widget</h4>
                    <blockquote class="blockquote-simple">
                        <p>Art is the only serious thing in the world. And the artist is the only person who is never serious.</p>
                        <small>by <cite>Oscar Wilde</cite></small>
                    </blockquote>
                </div>
                <!--end: widget blockquote -->

            </div>
            <!-- END: Sidebar-->
        </div>
    </div>
</section>
<!-- END: SECTION -->
