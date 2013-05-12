<header id="main-header">
    <div class="grid">
        <h1 class="left"><a href="./index.php"><img src="images/logo.png" alt=""></a></h1>

        <nav class="left">
            <ul>
                <li><a href="index.php?action=browse">Browse Users</a></li>
            </ul>
        </nav>

        {if isset($session.name) & !empty($session.name)}
            <div class="right">
                <a class="account" href="index.php?action=user&user={$session.id}">
                    <img src="{$session.avatar_url}" alt="avatar">
                    Hi, {$session.login}!
                </a>

                <a class="logout" href="index.php?action=signout">
                    <img src="images/logout.png" alt="">
                </a>
            </div>
        {else}
            <a class="btn-github right" href="index.php?action=connect">Connect with github</a>
        {/if}

    </div>
</header>