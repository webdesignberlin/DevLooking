<header id="main-header">
    <div class="grid">
        <h1 class="left"><a href="./index.php"><img src="images/logo.png" alt=""></a></h1>

        <nav class="left">
            <ul>
                {if isset($session) & !empty($session)}
                    <li><a href="index.php?action=create">Create a project</a></li>
                {/if}
                <li><a href="index.php?action=browse">Browse Users</a></li>
                {if isset($session) & !empty($session)}
                    <li><a href="index.php?action=signout">Sign out</a></li>
                {/if}
            </ul>
        </nav>

        {if isset($session) & !empty($session)}
        <div class="right">
            <ul>
                <li><img src="{$session.avatar_url}" alt="avatar"> Hi, {$session.login}</li>
            </ul>
        </div>

        {else}
            <a class="btn-github right" href="http://localhost/Dropbox/Dev%20Looking/index.php?action=connect">Connect with github</a>
        {/if}

    </div>
</header>