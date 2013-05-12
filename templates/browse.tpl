<div id="content">
    <div class="grid">
            <header id="title">
                <h2>Browse Users</h2>

                <form action="./index.php?action=browse" method="POST">
                    <select class="input-form" name="query-type" onchange='submit()'>
                        <option value="lan">Language</option>
                        <option value="personal_score">User Score</option>
                        <option value="repos_score">Repository Score</option>
                        <option value="external_score">Contribution Score</option>
                    </select>
                    <input class="input-form" type="text" value="" name="query">
                    <input type="submit" value="Go">
                </form>

                <div class="clear"></div>
            </header>

        {if !isset($empty)}
            <ul id="project-list">
                {foreach $datas as $data}
                <li>
                    <img src="{$data.avatar_url}" alt="">
                    {if !empty($data.name)}
                        <h2>{$data.name}</h2>
                    {/if}

                    <h3>{$data.login}</h3>
                    <ul>
                        {foreach $data.lan as $la}

                            {if empty($la@key)}
                                <li>Other</li>
                            {else}
                                <li>{$la@key}</li>
                            {/if}

                        {/foreach}
                    </ul>
                    <div class="user-browse-score">
                        <h3>Global score</h3>
                        <span>{$data.score}</span>
                    </div>
                    <a href="index.php?action=user&user={$data.id}" class="apply">View more</a>
                </li>
                {/foreach}
            </ul>
        {else}
            <div class="error">Nothing found :(</div>
        {/if}
    </div>
</div>