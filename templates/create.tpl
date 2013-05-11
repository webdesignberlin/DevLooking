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

			<form action="index.php?action=create" method="POST">
				
				<div>
					<label for="project-name">Project name</label>
					<input type="text" id="project-name" name="name">
				</div>

				<div>
					<label for="project-image">Choose a picture</label>
					<input type="file" id="project-image" name="image">
				</div>

				<div class="textarea">
					<label for="project-description">Enter a description</label>
					<textarea id="project-description" name="description">></textarea>
				</div>

				<div>
					<label for="project-technology">Technology use</label>
					<select id="project-technology"  name="technology">>
						<option>HTML5</option>
						<option>CSS3</option>
					</select>
				</div>

				<div>
					<label for="project-search">People you are looking for</label>
					<select id="project-search" name="search">>
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