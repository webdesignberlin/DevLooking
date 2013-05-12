<div id="content">
    <div class="grid">

        <header id="title">
            <h2 class="left">Browse Users</h2>

            <form class="" action="./index.php?action=browse" method="POST">
                <select class="input-form" name="query-type">
                    <option value="lan">Language</option>
                    <option value="lan">Language</option>
                </select>
                <input class="input-form" type="text" value="" name="query">
                <input type="submit" value="Go">
            </form>

            <div class="clear"></div>
        </header>

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
    </div>
</div>