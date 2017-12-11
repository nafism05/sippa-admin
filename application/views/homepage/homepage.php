<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<!-- NEWS TICKER -->
		<div class="news-ticker">
			<div class="news-ticker-title">
				<h4>BREAKING NEWS</h4>
			</div>
			<div class="news-ticker-content">
				<a href="#">Suspendisse consectetur fringilla luctus</a>
				<a href="#">Lorem ipsum dolor sit amet, consectetur adipiscing elit</a>
				<a href="#">Pariatur quibusdam veritatis quisquam laboriosam esse</a>
				<a href="#">Morbi sagittis, sem quis lacinia faucibus, orci ipsum gravida tortor, vel interdum mi sapien ut justo.</a>
				<a href="#">Pariatur quibusdam veritatis quisquam laboriosam esse...</a>
				<a href="#">Pariatur quibusdam veritatis quisquam laboriosam esse...</a>
				<a href="#">Pariatur quibusdam veritatis quisquam laboriosam esse...</a>
				<a href="#">Pariatur quibusdam veritatis quisquam laboriosam esse...</a>
				<a href="#">Pariatur quibusdam veritatis quisquam laboriosam esse...</a>
			</div>
		</div>
		<!-- END: NEWS TICKER -->


		<!-- NEWS GRID -->
		<section class="no-padding">
			<div class="grid-articles">
				<?php foreach($grid as $row){ ?>
					<article class="post-entry">
						<a href="#" class="post-image"><img alt="" src="<?=base_url('assets/');?>uploads/post/thumbnail/595_<?=$row->thumbnail;?>"></a>
						<div class="post-entry-overlay">
							<div class="post-entry-meta">
								<div class="post-entry-meta-category">
									<span class="label label-danger"><?=$row->kategori;?></span>
								</div>
								<div class="post-entry-meta-title">
									<h2><a href="<?=site_url($post_page)?><?=$row->slug;?>"><?=$row->judul;?></a></h2>
								</div>
								<span class="post-date"><i class="fa fa-clock-o"></i> <?=$row->modified;?></span>
							</div>
						</div>
					</article>
				<?php } ?>
			</div>
		</section>
		<!-- END: NEWS GRID -->

		<div class="news-section-wrapper">


			<!-- BOXES -->
			<section class="p-t-40 p-b-40">
				<div class="container-fluid">

					<div class="row">

						<div class="col-md-4">
							<div class="heading-fancy heading-line">
								<h4>NEWS</h4></div>
							<div class="post-thumbnail">
								<div class="post-thumbnail-entry">
									<img alt="" src="<?=base_url('assets/');?>uploads/post/thumbnail/595_<?=$Knews1->thumbnail?>">
									<div class="post-thumbnail-content">
										<span class="post-date"><i class="fa fa-clock-o"></i> <?=$Knews1->modified?></span>
										<!-- <span class="post-category"><i class="fa fa-tag"></i> Technology</span> -->
										<h3><a href="#"><?=$Knews1->judul?></a></h3>
										<p><?=substr(strip_tags($Knews1->isi),0,100)?>.</p>

									</div>
								</div>
							</div>
							<div class="post-thumbnail-list">
								<?php foreach ($Knews as $news) {?>
									<div class="post-thumbnail-entry">
										<div class="post-thumbnail-content">
											<h4><a href="#"><?=$news->judul?></a></h4>

										</div>
									</div>
								<?php }?>
							</div>
						</div>
						<div class="col-md-4">
							<div class="heading-fancy heading-line">
								<h4>SPORT</h4></div>
							<div class="post-thumbnail">
								<div class="post-thumbnail-entry">
									<img alt="" src="<?=base_url('assets/');?>uploads/post/thumbnail/595_<?=$Ksport1->thumbnail?>">
									<div class="post-thumbnail-content">
										<span class="post-date"><i class="fa fa-clock-o"></i> <?=$Ksport1->modified?></span>
										<!-- <span class="post-category"><i class="fa fa-tag"></i> Technology</span> -->
										<h3><a href="#"><?=$Ksport1->judul?></a></h3>
										<p><?=substr(strip_tags($Ksport1->isi),0,100)?>.</p>

									</div>
								</div>
							</div>
							<div class="post-thumbnail-list">
								<?php foreach ($Ksport as $sport) {?>
									<div class="post-thumbnail-entry">
										<div class="post-thumbnail-content">
											<h4><a href="#"><?=$sport->judul?></a></h4>

										</div>
									</div>
								<?php }?>
							</div>
						</div>
						<div class="col-md-4">
							<div class="heading-fancy heading-line">
								<h4>HEALTH</h4></div>
							<div class="post-thumbnail">
								<div class="post-thumbnail-entry">
									<img alt="" src="<?=base_url('assets/');?>uploads/post/thumbnail/595_<?=$Khealth1->thumbnail?>">
									<div class="post-thumbnail-content">
										<span class="post-date"><i class="fa fa-clock-o"></i> <?=$Khealth1->modified?></span>
										<!-- <span class="post-category"><i class="fa fa-tag"></i> Technology</span> -->
										<h3><a href="#"><?=$Khealth1->judul?></a></h3>
										<p><?=substr(strip_tags($Khealth1->isi),0,100)?>.</p>

									</div>
								</div>
							</div>
							<div class="post-thumbnail-list">
								<?php foreach ($Khealth as $health) {?>
									<div class="post-thumbnail-entry">
										<div class="post-thumbnail-content">
											<h4><a href="#"><?=$health->judul?></a></h4>

										</div>
									</div>
								<?php }?>								
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- END: BOXES -->

			<!-- CAROUSEL -->
			<!-- <section class="background-colored">
				<div class="container">
					<div class="text-medium text-light">HIGHTLIGHTS</div>
					<div class="grid-articles carousel post-carousel m-b-20">
						<article class="post-entry">
							<a href="#" class="post-image"><img alt="" src="homepages/magazine/images/news/carousel/1.jpg"></a>
							<div class="post-entry-overlay">
								<div class="post-entry-meta">
									<div class="post-entry-meta-category">
										<span class="label label-danger">NEWS</span>
									</div>
									<div class="post-entry-meta-title">
										<h2><a href="#">Pellentesque ipsum erat, facilisis ut venenatis eu, sodales vel dolor</a></h2>
									</div>
								</div>
							</div>
						</article>
						<article class="post-entry">
							<a href="#" class="post-image"><img alt="" src="homepages/magazine/images/news/carousel/2.jpg"></a>
							<div class="post-entry-overlay">
								<div class="post-entry-meta">
									<div class="post-entry-meta-category">
										<span class="label label-danger">LIFESTYLE</span>
									</div>
									<div class="post-entry-meta-title">
										<h2><a href="#">Consectetur adipiscing elit</a></h2>
									</div>
								</div>
							</div>
						</article>
						<article class="post-entry">
							<a href="#" class="post-image"><img alt="" src="homepages/magazine/images/news/carousel/3.jpg"></a>
							<div class="post-entry-overlay">
								<div class="post-entry-meta">
									<div class="post-entry-meta-category">
										<span class="label label-danger">LIFESTYLE</span>
									</div>
									<div class="post-entry-meta-title">
										<h2><a href="#">Suspendisse consectetur fringilla luctus</a></h2>
									</div>
								</div>
							</div>
						</article>
						<article class="post-entry">
							<a href="#" class="post-image"><img alt="" src="homepages/magazine/images/news/carousel/4.jpg"></a>
							<div class="post-entry-overlay">
								<div class="post-entry-meta">
									<div class="post-entry-meta-category">
										<span class="label label-danger">World</span>
									</div>
									<div class="post-entry-meta-title">
										<h2><a href="#">Fusce id mi diam, non ornare orci</a></h2>
									</div>
								</div>
							</div>
						</article>
						<article class="post-entry">
							<a href="#" class="post-image"><img alt="" src="homepages/magazine/images/news/carousel/5.jpg"></a>
							<div class="post-entry-overlay">
								<div class="post-entry-meta">
									<div class="post-entry-meta-category">
										<span class="label label-danger">World</span>
									</div>
									<div class="post-entry-meta-title">
										<h2><a href="#">Lorem ipsum dolor sit amet, consectetur adipiscing elit</a></h2>
									</div>
								</div>
							</div>
						</article>
						<article class="post-entry">
							<a href="#" class="post-image"><img alt="" src="homepages/magazine/images/news/carousel/6.jpg"></a>
							<div class="post-entry-overlay">
								<div class="post-entry-meta">
									<div class="post-entry-meta-category">
										<span class="label label-danger">World</span>
									</div>
									<div class="post-entry-meta-title">
										<h2><a href="#">Lorem ipsum dolor sit amet, consectetur adipiscing elit</a></h2>
									</div>
								</div>
							</div>
						</article>
						<article class="post-entry">
							<a href="#" class="post-image"><img alt="" src="homepages/magazine/images/news/carousel/7.jpg"></a>
							<div class="post-entry-overlay">
								<div class="post-entry-meta">
									<div class="post-entry-meta-category">
										<span class="label label-danger">World</span>
									</div>
									<div class="post-entry-meta-title">
										<h2><a href="#">Lorem ipsum dolor sit amet, consectetur adipiscing elit</a></h2>
									</div>
								</div>
							</div>
						</article>
					</div>
					<div class="text-light text-right">
						<a class="read-more" href="blog-post.html">
All stories in Highlights <i class="fa fa-long-arrow-right"></i></a></div>
				</div>
			</section> -->
			<!-- END: CAROUSEL -->


			<!-- ADVERTISEMENT -->
			<section class="p-t-20 p-b-40">
				<div class="container">
					<div class="marketing-box">ADVERTISEMENT</div>
				</div>
			</section>
			<!-- END: ADVERTISEMENT -->

			<!-- CATEGORIES -->
			<section class="p-t-0 p-b-40">
				<div class="container">

					<div class="row">
						<div class="col-md-4">
							<div class="heading-fancy heading-line">
								<h4>TECH</h4></div>
							<div class="post-thumbnail-list">
								<div class="post-thumbnail-entry">
									<img alt="" src="homepages/magazine/images/news/thumbnail/1.jpg">
									<div class="post-thumbnail-content">
										<h4><a href="#">Suspendisse consectetur fringilla luctus</a></h4>
										<span class="post-date"><i class="fa fa-clock-o"></i> 6m ago</span>
										<span class="post-category"><i class="fa fa-tag"></i> Technology</span>
									</div>
								</div>
								<div class="post-thumbnail-entry">
									<img alt="" src="homepages/magazine/images/news/thumbnail/2.jpg">
									<div class="post-thumbnail-content">
										<h4><a href="#">Consectetur adipiscing elit</a></h4>
										<span class="post-date"><i class="fa fa-clock-o"></i> 24h ago</span>
										<span class="post-category"><i class="fa fa-tag"></i> Lifestyle</span>
									</div>
								</div>
								<div class="post-thumbnail-entry">
									<img alt="" src="homepages/magazine/images/news/thumbnail/3.jpg">
									<div class="post-thumbnail-content">
										<h4><a href="#">Lorem ipsum dolor sit amet, consectetur adipiscing elit</a></h4>
										<span class="post-date"><i class="fa fa-clock-o"></i> 11h ago</span>
										<span class="post-category"><i class="fa fa-tag"></i> Lifestyle</span>
									</div>
								</div>
								<div class="post-thumbnail-entry">
									<img alt="" src="homepages/magazine/images/news/thumbnail/4.jpg">
									<div class="post-thumbnail-content">
										<h4><a href="#">Consectetur ipsum dolor sit amet</a></h4>
										<span class="post-date"><i class="fa fa-clock-o"></i> 8h ago</span>
										<span class="post-category"><i class="fa fa-tag"></i> Lifestyle</span>
									</div>
								</div>

							</div>

						</div>
						<div class="col-md-4">
							<div class="heading-fancy heading-line">
								<h4>SPORT</h4></div>
							<div class="post-thumbnail-list">
								<div class="post-thumbnail-entry">
									<img alt="" src="homepages/magazine/images/news/thumbnail/5.jpg">
									<div class="post-thumbnail-content">
										<h4><a href="#">Suspendisse consectetur fringilla luctus</a></h4>
										<span class="post-date"><i class="fa fa-clock-o"></i> 6m ago</span>
										<span class="post-category"><i class="fa fa-tag"></i> Technology</span>
									</div>
								</div>
								<div class="post-thumbnail-entry">
									<img alt="" src="homepages/magazine/images/news/thumbnail/6.jpg">
									<div class="post-thumbnail-content">
										<h4><a href="#">Consectetur adipiscing elit</a></h4>
										<span class="post-date"><i class="fa fa-clock-o"></i> 24h ago</span>
										<span class="post-category"><i class="fa fa-tag"></i> Lifestyle</span>
									</div>
								</div>
								<div class="post-thumbnail-entry">
									<img alt="" src="homepages/magazine/images/news/thumbnail/7.jpg">
									<div class="post-thumbnail-content">
										<h4><a href="#">Lorem ipsum dolor sit amet, consectetur adipiscing elit</a></h4>
										<span class="post-date"><i class="fa fa-clock-o"></i> 11h ago</span>
										<span class="post-category"><i class="fa fa-tag"></i> Lifestyle</span>
									</div>
								</div>
								<div class="post-thumbnail-entry">
									<img alt="" src="homepages/magazine/images/news/thumbnail/8.jpg">
									<div class="post-thumbnail-content">
										<h4><a href="#">Fringilla luctus Lorem ipsum dolor sit amet</a></h4>
										<span class="post-date"><i class="fa fa-clock-o"></i> 11h ago</span>
										<span class="post-category"><i class="fa fa-tag"></i> Lifestyle</span>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="heading-fancy heading-line">
								<h4>FASHION</h4></div>
							<div class="post-thumbnail-list">
								<div class="post-thumbnail-entry">
									<img alt="" src="homepages/magazine/images/news/thumbnail/1.jpg">
									<div class="post-thumbnail-content">
										<h4><a href="#">Suspendisse consectetur fringilla luctus</a></h4>
										<span class="post-date"><i class="fa fa-clock-o"></i> 6m ago</span>
										<span class="post-category"><i class="fa fa-tag"></i> Technology</span>
									</div>
								</div>
								<div class="post-thumbnail-entry">
									<img alt="" src="homepages/magazine/images/news/thumbnail/2.jpg">
									<div class="post-thumbnail-content">
										<h4><a href="#">Consectetur adipiscing elit</a></h4>
										<span class="post-date"><i class="fa fa-clock-o"></i> 24h ago</span>
										<span class="post-category"><i class="fa fa-tag"></i> Lifestyle</span>
									</div>
								</div>
								<div class="post-thumbnail-entry">
									<img alt="" src="homepages/magazine/images/news/thumbnail/3.jpg">
									<div class="post-thumbnail-content">
										<h4><a href="#">Lorem ipsum dolor sit amet, consectetur adipiscing elit</a></h4>
										<span class="post-date"><i class="fa fa-clock-o"></i> 11h ago</span>
										<span class="post-category"><i class="fa fa-tag"></i> Lifestyle</span>
									</div>
								</div>
								<div class="post-thumbnail-entry">
									<img alt="" src="homepages/magazine/images/news/thumbnail/4.jpg">
									<div class="post-thumbnail-content">
										<h4><a href="#">Consectetur ipsum dolor sit amet</a></h4>
										<span class="post-date"><i class="fa fa-clock-o"></i> 8h ago</span>
										<span class="post-category"><i class="fa fa-tag"></i> Lifestyle</span>
									</div>
								</div>

							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- END: HIGHTLIGHTS -->

			<!-- ADVERTISEMENT -->
			<!-- <section class="p-t-0 p-b-40">
				<div class="container">
					<div class="marketing-box">ADVERTISEMENT</div>
				</div>
			</section> -->
			<!-- END: ADVERTISEMENT -->

			<!-- CATEGORIES -->
			<!-- <section class="p-t-0 p-b-40">
				<div class="container">

					<div class="row">
						<div class="col-md-4">
							<div class="heading-fancy heading-line">
								<h4>ENTERTAINMENT</h4></div>
							<div class="post-thumbnail-list">
								<div class="post-thumbnail-entry">
									<img alt="" src="homepages/magazine/images/news/thumbnail/1.jpg">
									<div class="post-thumbnail-content">
										<h4><a href="#">Suspendisse consectetur fringilla luctus</a></h4>
										<span class="post-date"><i class="fa fa-clock-o"></i> 6m ago</span>
										<span class="post-category"><i class="fa fa-tag"></i> Technology</span>
									</div>
								</div>
								<div class="post-thumbnail-entry">
									<img alt="" src="homepages/magazine/images/news/thumbnail/2.jpg">
									<div class="post-thumbnail-content">
										<h4><a href="#">Consectetur adipiscing elit</a></h4>
										<span class="post-date"><i class="fa fa-clock-o"></i> 24h ago</span>
										<span class="post-category"><i class="fa fa-tag"></i> Lifestyle</span>
									</div>
								</div>
								<div class="post-thumbnail-entry">
									<img alt="" src="homepages/magazine/images/news/thumbnail/3.jpg">
									<div class="post-thumbnail-content">
										<h4><a href="#">Lorem ipsum dolor sit amet, consectetur adipiscing elit</a></h4>
										<span class="post-date"><i class="fa fa-clock-o"></i> 11h ago</span>
										<span class="post-category"><i class="fa fa-tag"></i> Lifestyle</span>
									</div>
								</div>
								<div class="post-thumbnail-entry">
									<img alt="" src="homepages/magazine/images/news/thumbnail/4.jpg">
									<div class="post-thumbnail-content">
										<h4><a href="#">Consectetur ipsum dolor sit amet</a></h4>
										<span class="post-date"><i class="fa fa-clock-o"></i> 8h ago</span>
										<span class="post-category"><i class="fa fa-tag"></i> Lifestyle</span>
									</div>
								</div>

							</div>

						</div>
						<div class="col-md-4">
							<div class="heading-fancy heading-line">
								<h4>NATURE</h4></div>
							<div class="post-thumbnail-list">
								<div class="post-thumbnail-entry">
									<img alt="" src="homepages/magazine/images/news/thumbnail/5.jpg">
									<div class="post-thumbnail-content">
										<h4><a href="#">Suspendisse consectetur fringilla luctus</a></h4>
										<span class="post-date"><i class="fa fa-clock-o"></i> 6m ago</span>
										<span class="post-category"><i class="fa fa-tag"></i> Technology</span>
									</div>
								</div>
								<div class="post-thumbnail-entry">
									<img alt="" src="homepages/magazine/images/news/thumbnail/6.jpg">
									<div class="post-thumbnail-content">
										<h4><a href="#">Consectetur adipiscing elit</a></h4>
										<span class="post-date"><i class="fa fa-clock-o"></i> 24h ago</span>
										<span class="post-category"><i class="fa fa-tag"></i> Lifestyle</span>
									</div>
								</div>
								<div class="post-thumbnail-entry">
									<img alt="" src="homepages/magazine/images/news/thumbnail/7.jpg">
									<div class="post-thumbnail-content">
										<h4><a href="#">Lorem ipsum dolor sit amet, consectetur adipiscing elit</a></h4>
										<span class="post-date"><i class="fa fa-clock-o"></i> 11h ago</span>
										<span class="post-category"><i class="fa fa-tag"></i> Lifestyle</span>
									</div>
								</div>
								<div class="post-thumbnail-entry">
									<img alt="" src="homepages/magazine/images/news/thumbnail/8.jpg">
									<div class="post-thumbnail-content">
										<h4><a href="#">Fringilla luctus Lorem ipsum dolor sit amet</a></h4>
										<span class="post-date"><i class="fa fa-clock-o"></i> 11h ago</span>
										<span class="post-category"><i class="fa fa-tag"></i> Lifestyle</span>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="heading-fancy heading-line">
								<h4>POLITICS</h4></div>
							<div class="post-thumbnail-list">
								<div class="post-thumbnail-entry">
									<img alt="" src="homepages/magazine/images/news/thumbnail/1.jpg">
									<div class="post-thumbnail-content">
										<h4><a href="#">Suspendisse consectetur fringilla luctus</a></h4>
										<span class="post-date"><i class="fa fa-clock-o"></i> 6m ago</span>
										<span class="post-category"><i class="fa fa-tag"></i> Technology</span>
									</div>
								</div>
								<div class="post-thumbnail-entry">
									<img alt="" src="homepages/magazine/images/news/thumbnail/2.jpg">
									<div class="post-thumbnail-content">
										<h4><a href="#">Consectetur adipiscing elit</a></h4>
										<span class="post-date"><i class="fa fa-clock-o"></i> 24h ago</span>
										<span class="post-category"><i class="fa fa-tag"></i> Lifestyle</span>
									</div>
								</div>
								<div class="post-thumbnail-entry">
									<img alt="" src="homepages/magazine/images/news/thumbnail/3.jpg">
									<div class="post-thumbnail-content">
										<h4><a href="#">Lorem ipsum dolor sit amet, consectetur adipiscing elit</a></h4>
										<span class="post-date"><i class="fa fa-clock-o"></i> 11h ago</span>
										<span class="post-category"><i class="fa fa-tag"></i> Lifestyle</span>
									</div>
								</div>
								<div class="post-thumbnail-entry">
									<img alt="" src="homepages/magazine/images/news/thumbnail/4.jpg">
									<div class="post-thumbnail-content">
										<h4><a href="#">Consectetur ipsum dolor sit amet</a></h4>
										<span class="post-date"><i class="fa fa-clock-o"></i> 8h ago</span>
										<span class="post-category"><i class="fa fa-tag"></i> Lifestyle</span>
									</div>
								</div>

							</div>
						</div>
					</div>
				</div>
			</section> -->
			<!-- END: CATEGORIES -->

		</div>
		<!-- CALL TO ACTION -->
		<!-- <div class="jumbotron jumbotron-fullwidth background-colored text-light m-b-0">
			<div class="container">
				<h3>Ready to purchase POLO Template?</h3>
				<p>This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
				<a href="#" class="button transparent rounded"><span>Purchase</span></a>
			</div>
		</div> -->
		<!-- END: CALL TO ACTION -->