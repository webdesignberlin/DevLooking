<header id="main-header">
	<div class="grid">
		<h1 class="left"><a href="./"><img src="images/logo.png" alt=""></a></h1>

		<nav class="left">
			<ul>
				<li><a href="">Create a project</a></li>
				<li><a href="">Browse projects</a></li>
			</ul>
		</nav>

        {if isset($session) & !empty($session)}
            <div>Hi, {$session.login}<img src="{$session.avatar_url}" alt="avatar"/></div>
        {else}
            <a class="btn-github right" href="http://localhost/Dropbox/Dev%20Looking/index.php?action=connect">Connect with github</a>
        {/if}

	</div>
</header>

<div id="content">
	<div class="grid">
	
		<header id="title">
			<h2 class="left">Browse projects</h2>
			<select class="right">
				<optgroup label="Filtres">
					<option>Favorites</option>
					<option>Popularity</option>
				</optgroup>
			</select>
			<div class="clear"></div>
		</header>

		<ul id="project-list">
			<li>
				<img src="http://placekitten.com/285/225" alt="">
				<h3>Title project</h3>
				<ul>
					<li>Ruby</li>
					<li>Angular JS</li>
					<li>SCSS</li>
				</ul>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
				<a href="" class="apply">View more</a>
			</li>
			<li>
				<img src="http://placekitten.com/285/225" alt="">
				<h3>Title project</h3>
				<ul>
					<li>Ruby</li>
					<li>Angular JS</li>
					<li>SCSS</li>
				</ul>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
				<a href="" class="apply">View more</a>
			</li>
			<li>
				<img src="http://placekitten.com/285/225" alt="">
				<h3>Title project</h3>
				<ul>
					<li>Ruby</li>
					<li>Angular JS</li>
					<li>SCSS</li>
				</ul>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
				<a href="" class="apply">View more</a>
			</li>
			<li>
				<img src="http://placekitten.com/285/225" alt="">
				<h3>Title project</h3>
				<ul>
					<li>Ruby</li>
					<li>Angular JS</li>
					<li>SCSS</li>
				</ul>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
				<a href="" class="apply">View more</a>
			</li>
			<li>
				<img src="http://placekitten.com/285/225" alt="">
				<h3>Title project</h3>
				<ul>
					<li>Ruby</li>
					<li>Angular JS</li>
					<li>SCSS</li>
				</ul>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
				<a href="" class="apply">View more</a>
			</li>
			<li>
				<img src="http://placekitten.com/285/225" alt="">
				<h3>Title project</h3>
				<ul>
					<li>Ruby</li>
					<li>Angular JS</li>
					<li>SCSS</li>
				</ul>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
				<a href="" class="apply">View more</a>
			</li>
			<li>
				<img src="http://placekitten.com/285/225" alt="">
				<h3>Title project</h3>
				<ul>
					<li>Ruby</li>
					<li>Angular JS</li>
					<li>SCSS</li>
				</ul>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
				<a href="" class="apply">View more</a>
			</li>
			<li>
				<img src="http://placekitten.com/285/225" alt="">
				<h3>Title project</h3>
				<ul>
					<li>Ruby</li>
					<li>Angular JS</li>
					<li>SCSS</li>
				</ul>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
				<a href="" class="apply">View more</a>
			</li>
			<li>
				<img src="http://placekitten.com/285/225" alt="">
				<h3>Title project</h3>
				<ul>
					<li>Ruby</li>
					<li>Angular JS</li>
					<li>SCSS</li>
				</ul>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
				<a href="" class="apply">View more</a>
			</li>
		</ul>
	</div>
</div>