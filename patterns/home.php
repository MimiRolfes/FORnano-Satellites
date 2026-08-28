<?php
/**
 * Title: Home Content
 * Slug: satellite/home
 * Categories: satellite
 * Inserter: no
 */
?>
<!-- HERO -->
<section class="hero">

	<!-- Earth photo fills entire viewport -->
	<img class="hero-earth"
		src="<?php echo esc_url( get_template_directory_uri() . '/images/landing-earth.jpg' ); ?>"
		alt="Earth from space" />

	<!-- WebGL animated orb (Nova) -->
	<div class="hero-orb" id="hero-orb"></div>

	<!-- Headline center-left -->
	<div class="hero-text-left">
		<h1 class="hero-headline">
			A <span class="accent">BETTER VIEW</span><br>FROM ABOVE
		</h1>
	</div>

	<!-- Info + CTA center-right -->
	<div class="hero-text-right">
		<p class="hero-eyebrow">A PROJECT FROM FAU STUDENTS</p>
		<p class="hero-eyebrow">SUPERVISION BY PROF. FEY</p>
		<a href="#about" class="btn-about" data-label="ABOUT &#8599;" aria-label="About"></a>
	</div>

</section>

<!-- ABOUT -->
<section class="section" id="about">
	<div class="container">
		<div class="about-grid">
			<div class="about-text">
				<p class="label">ABOOUT</p>
				<h2 class="heading">Watching the Clouds with our Satllite. Find out more about our porject</h2>
				<a href="<?php echo esc_url( home_url( '/about/' ) ); ?>" class="btn-about" data-label="ABOUT THE PROJECT &#8599;" aria-label="About the Project"></a>
			</div>
			<div class="about-image">
				<img src="<?php echo esc_url( get_template_directory_uri() . '/images/about-planet.jpg' ); ?>" alt="Stylised render of a planet surface" />
			</div>
			<div class="stats-row">
				<div class="stat-item">
					<span class="stat-n">100<em>%</em></span>
					<span class="stat-l">Hours of Work</span>
				</div>
				<div class="stat-item">
					<span class="stat-n">20<em>+</em></span>
					<span class="stat-l">Lines of Code</span>
				</div>
				<div class="stat-item">
					<span class="stat-n">50<em>+</em></span>
					<span class="stat-l">Tests run through</span>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- HIGHLIGHTS -->
<section class="section section--dark" id="highlights">
	<div class="container">
		<p class="label">HIGHLIGHTS</p>
		<h2 class="heading">Highlights of our<br>Work process</h2>
		<div class="highlights-grid">
			<div class="hl-card">
				<span class="hl-num">01</span>
				<p>Gain tech insights from founders &amp; true leaders</p>
			</div>
			<div class="hl-card">
				<span class="hl-num">02</span>
				<p>Join workshops with AI experts creative solving.</p>
			</div>
			<div class="hl-card">
				<span class="hl-num">03</span>
				<p>Connect with like-minded professionals and expand</p>
			</div>
			<div class="hl-card">
				<span class="hl-num">04</span>
				<p>Exploring the future of AI and tech with experts.</p>
			</div>
		</div>
	</div>
</section>

<!-- TEAM -->
<section class="section" id="team">
	<div class="container">
		<p class="label">SUPPERRVISON</p>
		<h2 class="heading">About Us</h2>
		<div class="team-grid">
			<div class="team-card team-card--wide">
				<div class="team-init">PF</div>
				<div>
					<span class="team-role">Prof</span>
					<h3>Fey</h3>
					<p>FAU Erlangen-Nürnberg</p>
				</div>
			</div>
			<div class="team-card">
				<div class="team-init">R</div>
				<div><span class="team-role">Student</span><h3>Richard</h3></div>
			</div>
			<div class="team-card">
				<div class="team-init">F</div>
				<div><span class="team-role">Student</span><h3>Flo</h3></div>
			</div>
			<div class="team-card">
				<div class="team-init">Y</div>
				<div><span class="team-role">Student</span><h3>Yumyum</h3></div>
			</div>
			<div class="team-card">
				<div class="team-init">K</div>
				<div><span class="team-role">Student</span><h3>Khaled</h3></div>
			</div>
		</div>
	</div>
</section>

<!-- CONTACT -->
<section class="section" id="contact">
	<div class="container">
		<div class="contact-grid">
			<div>
				<p class="label">CONTACT</p>
				<h2 class="heading">Get in Touch</h2>
			</div>
			<div class="contact-links">
				<a href="mailto:jituraut@gmail.com" class="contact-row">
					<span class="contact-lbl">Email</span>
					<span>jituraut@gmail.com</span>
				</a>
				<a href="tel:+99125458999" class="contact-row">
					<span class="contact-lbl">Phone</span>
					<span>+99 125 458 999</span>
				</a>
			</div>
		</div>
	</div>
</section>
