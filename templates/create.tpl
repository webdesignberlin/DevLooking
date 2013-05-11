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

            {if isset($empty)}
                <span class="error">All inputs must be filled</span>
            {/if}

            <form action="index.php?action=create" method="POST" enctype="multipart/form-data">

				<div>
					<label for="project-name">Project name
                        {if isset($error.name)}
                            <span class="error">{($error.name)}</span>
                        {/if}
                    </label>
					<input class="input-form" type="text" id="project-name" name="name" value="{if isset($data.name)}{($data.name)}{/if}">
				</div>

				<div>
					<label for="project-image">Choose a picture</label>
					<input type="file" id="project-image" name="image">
				</div>

				<div class="textarea">
					<label for="project-description">Enter a description
                        {if isset($error.description)}
                            <span class="error">{($error.description)}</span>
                        {/if}
                    </label>
					<textarea class="input-form" id="project-description" name="description">{if isset($data.description)}{($data.description)}{/if}</textarea>

				</div>

				<div>
					<label for="project-technology">Technology use</label>
					<select id="project-technology" multiple style="width:450px" name="technology[]">
						<option value="11">ABSYS</option>
                            <option value="1">PHP</option>
                            <option value="2">HTML</option>
                            <option value="3">CSS</option>
							<option value="4">Mozilla</option>
							<option value="5">Scala</option>
							<option value="6">Caml</option>
							<option value="7">Dart</option>
							<option value="8">FuelPHP</option>
							<option value="9">App Engine</option>
							<option value="10">IOS</option>
							<option value="11">Android</option>
							<option value="12">Ruby on Rails</option>
							<option value="13">C</option>
							<option value="14">MySQL</option>
							<option value="15">CoffeeScript</option>
							<option value="16">JavaScript</option>
							<option value="17">C#</option>
							<option value="18">Windows 8</option>
							<option value="19">Ruby</option>
							<option value="20">ASP.NET</option>
							<option value="21">Github</option>
							<option value="22">App Engine</option>
							<option value="23">Windows Azure</option>
							<option value="24">Google App Engine</option>
							<option value="25">Symfony</option>
							<option value="26">Perl</option>
							<option value="27">Processing.js</option>
							<option value="28">Unity</option>
							<option value="29">Heroku</option>
							<option value="30">Go</option>
					</select>
				</div>

				<div>
					<label for="project-search">People you are looking for</label>
					<select id="project-search" multiple style="width:600px" name="search[]">
                        <option value="1">Front-End developer</option>
                        <option value="2">Back-End developer</option>
                        <option value="3">Hacker</option>
                        <option value="4">Business</option>
                        <option value="5">Designer</option>
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