<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<!-- CONTENT -->
<section class="content">
	<div class="container">
		<div class="row">
			<!-- Blog post-->
			<div class="post-content col-md-9">
				<!-- Blog image post-->
				<?php foreach($konten as $row) : ?>
				<div class="post-item" id="post-item1">
					<div class="post-content-details">
						<div class="post-title">
							<h3 id="judul-post-index"><a href="#"><?=$row->judul;?></a></h3>
						</div>
					</div>
					<div class="post-meta" id="post-meta1">
						<div class="post-date">
							<span class="post-date-day"><?=date("d", strtotime($row->published_at));?></span>
							<span class="post-date-month"><?=date("F", strtotime($row->published_at));?></span>
							<span class="post-date-year"><?=date("Y", strtotime($row->published_at));?></span>
						</div>
					</div>
				</div>
				<? endforeach; ?>
				
			</div>
			<!-- END: Blog post-->

			<!-- Sidebar-->
			<div class="sidebar sidebar-modern col-md-3">

				<!--widget tags -->
				<div class="widget clearfix widget-tags">
					<h4 class="widget-title">Kategori</h4>
					<div class="tags">
						<?php foreach ($kategori as $cat){ ?>
							<a href="<?=site_url($indeks_berita_page.'/'.$cat->slug);?>"><?=$cat->name;?></a>
            <?php } ?>
					</div>
				</div>
				<!--end: widget tags -->

				<div class="widget clearfix">
					<h4 class="widget-title">Sort by Date</h4>
          <?=form_open('berita/indeks');?>
          	<div class="form-group">
              <input type="text" name="sortdate" placeholder="" class="form-control sortdate" id="datepicker" data-date-format="yyyy-mm-dd">
            </div>
          	<div class="form-group">
							<button type="submit" class="btn btn-primary btn1">Submit</button>	
            </div>
          </form>
        </div>

				<!--widget search-->
				<div class="widget clearfix widget-search">
                            <form action="search-results-page.html" method="get" class="form-inline">
                                <div class="input-group">
                                    <input type="text" name="q" placeholder="Search for pages..." class="form-control">
                                    <span class="input-group-btn">
										<button type="submit" class="btn color btn-primary"><i class="fa fa-search"></i></button>	
									</span>
                                </div>
                            </form>
                        </div>
				<!--end: widget search-->

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

				<!--widget slider-->
				<div class="widget clearfix widget-slider">
					<h4 class="widget-title">Slider</h4>
					<div class="post-slider">
						<div class="carousel" data-carousel-dots="true" data-carousel-col="1" data-carousel-autoplay="true">
							<img alt="image" src="images/blog/thumb/7.jpg">
							<img alt="image" src="images/blog/thumb/6.jpg">
							<img alt="image" src="images/blog/thumb/5.jpg">
						</div>
					</div>
				</div>
				<!--end: widget slider -->

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