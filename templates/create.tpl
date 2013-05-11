<header id="main-header">
	<div class="grid">
		<h1 class="left"><a href="./"><img src="images/logo.png" alt=""></a></h1>

		<nav class="left">
			<ul>
				<li><a href="">Create a project</a></li>
				<li><a href="">Browse projects</a></li>
			</ul>
		</nav>

		<a class="btn-github right" href="https://github.com/login/oauth/authorize?client_id=e66e6ec9c7f680faf807">Connect with github</a>

	</div>
</header>

<div id="content">
	<div class="grid">
		<header id="title">
			<h2>Create a new project</h2>
		</header>

		<section id="main-content">
			<div class="top">
				<ul>
					<li class="step-1">
						<div class="step-circle grey">1</div>
						<p>Create your project</p>
					</li>
					<li class="step-2">
						<div class="step-circle grey">2</div>
						<p>Share your project page</p>
					</li>
					<li class="step-3">
						<div class="step-circle blue">3</div>
						<p>And it's done!</p>
					</li>
				</ul>
			</div>

			<form action="">
				
				<div>
					<label for="project-name">Project name</label>
					<input type="text" id="project-name">
				</div>

				<div>
					<label for="project-image">Choose a picture</label>
					<input type="file" id="project-image">
				</div>

				<div class="textarea">
					<label for="project-description">Enter a description</label>
					<textarea id="project-description"></textarea>
				</div>

				<div>
					<label for="project-technology">Technology use</label>
					<select id="project-technology">
						<option>HTML5</option>
						<option>CSS3</option>
					</select>
				</div>

				<div>
					<label for="project-search">People you are looking for</label>
					<select id="project-search">
						<option>Front-End developer</option>
					</select>
				</div>

				<!-- description, image, techno, developpeur recherché -->

				<div>
					<input type="hidden">
					<input type="submit" value="Create the project">
				</div>

			</form>
		</section>
	</div>
</div>

<footer id="main-footer">
	
</footer>