<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<!-- CAROUSEL -->
<section class="no-padding">
	<div class="grid-articles carousel post-carousel" data-carousel-col="3" data-carousel-margins="0">
		<?php foreach($carousel as $row){ ?>
			<article class="post-entry">
				<a href="#" class="post-image"><img alt="" src="<?=base_url('assets/');?>uploads/post/thumbnail/595_<?=$row->thumbnail;?>"></a>
				<div class="post-entry-overlay">
					<div class="post-entry-meta">
						<div class="post-entry-meta-category">
							<span class="label label-danger"><?=$row->kategori;?></span>
						</div>
						<div class="post-entry-meta-title">
							<h2><a href="#"><?=$row->judul;?></a></h2>
						</div>
						<span class="post-date"><i class="fa fa-clock-o"></i> <?=$row->modified;?></span>
					</div>
				</div>
			</article>
		<?php } ?>
		
	</div>
</section>
<!-- END: CAROUSEL -->

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

<!-- HIGHTLIGHTS -->
<section class="p-t-40 p-b-40">
	<div class="container">
		<div class="heading-fancy heading-line">
			<h4>HIGHTLIGHTS</h4></div>
		<div class="row">
			<?php $i = 1; ?>
			<?php foreach ($highlight as $row) : ?>
				<?php if($i==1) : ?>
				<div class="col-md-5">
					<div class="post-thumbnail">
						<div class="post-thumbnail-entry">
							<img alt="" src="<?=base_url('assets/');?>uploads/post/thumbnail/595_<?=$row->thumbnail;?>">
							<div class="post-thumbnail-content">
								<h3><a href="#"><?=$row->judul;?></a></h3>
								<p><?=substr(strip_tags($row->isi),0,200)?>.</p>
								<span class="post-date"><i class="fa fa-clock-o"></i> <?=$row->modified;?></span>
								<span class="post-category"><i class="fa fa-tag"></i> <?=$row->kategori;?></span>
							</div>
						</div>
					</div>
				</div>
				<?php endif; ?>

				<?php if($i==2) : ?>
				<div class="col-md-7">
					<div class="row">
						<div class="col-md-6">
							<div class="post-thumbnail-list">
							<?php endif; ?>
								<?php if($i>=2 && $i<=5) : ?>
								<div class="post-thumbnail-entry">
									<img alt="" src="<?=base_url('assets/');?>uploads/post/thumbnail/200_<?=$row->thumbnail;?>">
									<div class="post-thumbnail-content">
										<h4><a href="#"><?=$row->judul;?></a></h4>
										<span class="post-date"><i class="fa fa-clock-o"></i> <?=$row->modified;?></span>
										<span class="post-category"><i class="fa fa-tag"></i> <?=$row->kategori;?></span>
									</div>
								</div>
								<?php endif; ?>
							<?php if($i==5) : ?>
							</div>
							<div class="marketing-box">ADVERTISEMENT</div>
							<?php endif; ?>
						<?php if($i==6) : ?>
						</div>
						<div class="col-md-6">
							<div class="post-thumbnail-list">
							<?php endif; ?>
								<?php if($i>=6 && $i<=9) : ?>
								<div class="post-thumbnail-entry">
									<img alt="" src="<?=base_url('assets/');?>uploads/post/thumbnail/200_<?=$row->thumbnail;?>">
									<div class="post-thumbnail-content">
										<h4><a href="#"><?=$row->judul;?></a></h4>
										<span class="post-date"><i class="fa fa-clock-o"></i> <?=$row->modified;?></span>
										<span class="post-category"><i class="fa fa-tag"></i> <?=$row->kategori;?></span>
									</div>
								</div>
								<?php endif; ?>
							<?php if($i==9) : ?>
							</div>
							<div class="marketing-box">ADVERTISEMENT</div>
						</div>
					</div>
				</div>
				<?php endif; ?>
				<?php $i++; ?>
			<?php endforeach; ?>
		</div> <!-- end row -->

	</div>
</section>
<!-- END: HIGHTLIGHTS -->