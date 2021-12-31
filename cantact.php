<?php
/*
Template Name: تماس با ما
*/ 
get_header();?>
    <main>
    <header class="title"><h2>تماس با ما</h2></header>
		<div id="map"></div>
		<blockquote>
			<header class="in_title"><h5>شماره تماس</h5></header>
			<p>دفتر : (031) 42433392</p>
			<p>همراه : 09139747006</p>
			<header class="in_title"><h5>ادرس</h5></header>
			<p>دفتر : اصفهان - چهار راه قصر - شیخ بهایی - جنب بانک ایران زمین - مجتمع تجاری اداری مستجاب - طبقه 2 - واحد 16</p>
		</blockquote>
		<blockquote>
			<header class="in_title"><h5>فرم تماس با ما</h5></header>
			<form class="row">
				<div class="form-group col-sm-6 col-xs-12">
					<label>نام شما (*)</label>
					<input type="text" name="your-name" value="" size="40" class="form-control">
				</div>
				<div class="form-group col-sm-6 col-xs-12">
					<label>آدرس پست الکترونیکی شما (*)</label>
					<input type="email" name="your-email" value="" size="40" class="form-control">
				</div>
				<div class="form-group col-sm-6 col-xs-12">
					<label>شماره تماس (*)</label>
					<input type="tel" name="tel-768" value="" size="40" class="form-control">
				</div>
				<div class="form-group col-sm-6 col-xs-12">
					<label>موضوع (*)</label>
					<input type="text" name="your-subject" value="" size="40" class="form-control">
				</div>
				<div class="form-group col-xs-12">
					<label>پیام شما</label>
					<textarea name="your-message" cols="40" rows="10" class="form-control"></textarea>
				</div>
				<div class="form-group col-xs-12">
					<input class="btn btn-default" type="submit" value="ارسال">
				</div>
			</form>
		</blockquote>
    </main>
<?php get_footer();?>