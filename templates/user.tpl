<div id="content">
	<div class="grid user">
		<section id="main-content">
			<div class="top">
				<img src="{$data.avatar_url}" alt="{$data.name}" class="avatar-user left">

				<div class="left">
					<h2><a href="{$data.html_url}">{$data.name}</a></h2>
					<span>{$data.login}</span>
				</div>

				{if isset($hireme)}
					{if $hireme == true}
						<li class="right hireme">
							<div class="step-circle green">✓</div>
							<p>Hire me!</p>
						</li>
					{/if}
				{/if}
			</div>

			<ul class="info">
				<span>Few informations</span>
				<li class="mail">{$data.email}</li>
				<li class="company">{$data.company}</li>
				<li class="location">{$data.location}</li>
			</ul>

			<div class="main-score">
				<span>Score global</span>
                {$data.score}
			</div>

			<div class="stat-1 user-stat">
				<span>Commits</span>
				350
			</div>

			<div class="stat-2 user-stat">
				<span>Repo</span>
				6
			</div>

		</section>

	</div>
</div>