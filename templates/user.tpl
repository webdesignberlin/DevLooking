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
				{if !empty($data.email)}
					<li class="mail">{$data.email}</li>
				{/li}

				{if !empty($data.company)}
					<li class="company">{$data.company}</li>
				{/li}

				{if !empty($data.location)}
					<li class="location">{$data.location}</li>
				{/li}
			</ul>

			<div class="main-score">
				<span>Score global

                    {if $data.score > 200000}
                        Master
                    {elseif $data.score > 100000}
                        Open source warrior
                    {elseif $data.score > 50000}
                        Rockstar
                    {elseif $data.score > 20000}
                        Ninja
                    {elseif $data.score > 10000}
                        Jedi
                    {elseif $data.score > 5000}
                        Padawan
                    {elseif $data.score > 2000}
                        Droïd
                    {elseif $data.score > 1000}
                        Newbie
                    {/if}


                </span>
                {$data.score}
			</div>

			<div class="stat-1 user-stat">
				<span>User Score</span>
                {$data.personal_score}
			</div>

			<div class="stat-2 user-stat">
				<span>Repository Score</span>
                {$data.repos_score}
			</div>

			<div class="stat-3 user-stat">
				<span>External Score</span>
                {$data.external_score}
			</div>

            <div>
                <span>Languages Score</span>

                {if count($data.lan) > 1}
                    <canvas id="pielan" width="400" height="400"></canvas>

                    <ul id="language-list">
                        {foreach $data.lan as $la}
                            {if empty($la@key)}
                                <li>Other</li>
                            {else}
                                <li>{$la@key}</li>
                            {/if}
                        {/foreach}
                    </ul>
                {else}
                    {foreach $data.lan as $la}
                        <p>100% {$la@key}</p>
                    {/foreach}
                {/if}
            </div>

		</section>

	</div>
</div>

{if count($data.lan) > 1}
    <script>
        $(document).ready(function() {
            var data = [
                {foreach $data.lan as $la}
                    {if $la@last}
                {
                    value: ({$la}/{$data.total})*100,
                    color: getColor('{$la@key}')
                }
                    {else}
                {
                    value: ({$la}/{$data.total})*100,
                    color: getColor('{$la@key}')
                },
                    {/if}
                {/foreach}

            ];

            var ctx = $("#pielan").get(0).getContext("2d");
            //This will get the first returned node in the jQuery collection.
            {literal}
                new Chart(ctx).PolarArea(data, {animation : false});
            {/literal}
            function getColor(language){
                var r;
                switch(language){

                    case "Arduino": r = "#bd79d1"; break;
                    case "Java": r = "#b07219"; break;
                    case "VHDL": r = "#543978"; break;
                    case "Scala": r = "#7dd3b0"; break;
                    case "Emacs Lisp": r = "#c065db"; break;
                    case "Delphi": r = "#b0ce4e"; break;
                    case "Ada": r = "#02f88c"; break;
                    case "VimL": r = "#199c4b"; break;
                    case "Perl": r = "#0298c3"; break;
                    case "Lua": r = "#fa1fa1"; break;
                    case "Rebol": r = "#358a5b"; break;
                    case "Verilog": r = "#848bf3"; break;
                    case "Factor": r = "#636746"; break;
                    case "Ioke": r = "#078193"; break;
                    case "R": r = "#198ce7"; break;
                    case "Erlang": r = "#949e0e"; break;
                    case "Nu": r = "#c9df40"; break;
                    case "AutoHotkey": r = "#6594b9"; break;
                    case "Clojure": r = "#db5855"; break;
                    case "Shell": r = "#5861ce"; break;
                    case "Assembly": r = "#a67219"; break;
                    case "Parrot": r = "#f3ca0a"; break;
                    case "C#": r = "#5a25a2"; break;
                    case "Turing": r = "#45f715"; break;
                    case "AppleScript": r = "#3581ba"; break;
                    case "Eiffel": r = "#946d57"; break;
                    case "Common Lisp": r = "#3fb68b"; break;
                    case "Dart": r = "#cccccc"; break;
                    case "SuperCollider": r = "#46390b"; break;
                    case "CoffeeScript": r = "#244776"; break;
                    case "XQuery": r = "#2700e2"; break;
                    case "Haskell": r = "#29b544"; break;
                    case "Racket": r = "#ae17ff"; break;
                    case "Elixir": r = "#6e4a7e"; break;
                    case "HaXe": r = "#346d51"; break;
                    case "Ruby": r = "#701516"; break;
                    case "Self": r = "#0579aa"; break;
                    case "Fantom": r = "#dbded5"; break;
                    case "Groovy": r = "#e69f56"; break;
                    case "C": r = "#555"; break;
                    case "JavaScript": r = "#f15501"; break;
                    case "D": r = "#fcd46d"; break;
                    case "ooc": r = "#b0b77e"; break;
                    case "C++": r = "#f34b7d"; break;
                    case "Dylan": r = "#3ebc27"; break;
                    case "Nimrod": r = "#37775b"; break;
                    case "Standard ML": r = "#dc566d"; break;
                    case "Objective-C": r = "#f15501"; break;
                    case "Nemerle": r = "#0d3c6e"; break;
                    case "Mirah": r = "#c7a938"; break;
                    case "Boo": r = "#d4bec1"; break;
                    case "Objective-J": r = "#ff0c5a"; break;
                    case "Rust": r = "#dea584"; break;
                    case "Prolog": r = "#74283c"; break;
                    case "Ecl": r = "#8a1267"; break;
                    case "Gosu": r = "#82937f"; break;
                    case "FORTRAN": r = "#4d41b1"; break;
                    case "ColdFusion": r = "#ed2cd6"; break;
                    case "OCaml": r = "#3be133"; break;
                    case "Fancy": r = "#7b9db4"; break;
                    case "Pure Data": r = "#f15501"; break;
                    case "Python": r = "#3581ba"; break;
                    case "Tcl": r = "#e4cc98"; break;
                    case "Arc": r = "#ca2afe"; break;
                    case "Puppet": r = "#cc5555"; break;
                    case "Io": r = "#a9188d"; break;
                    case "Max": r = "#ce279c"; break;
                    case "Go": r = "#8d04eb"; break;
                    case "ASP": r = "#6a40fd"; break;
                    case "Visual Basic": r = "#945db7"; break;
                    case "PHP": r = "#6e03c1"; break;
                    case "Scheme": r = "#1e4aec"; break;
                    case "Vala": r = "#3581ba"; break;
                    case "Smalltalk": r = "#596706"; break;
                    case "Matlab": r = "#bb92ac"; break;
                    case "C#": r = "#bb92af"; break;

                    default : r = "#aaa";
                }

                return r;
            }

            $('#language-list li').each(function() {
                $(this).css('backgroundColor', getColor($(this).html()))
            });
        });
    </script>
{/if}