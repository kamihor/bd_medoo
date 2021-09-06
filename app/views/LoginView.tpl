{extends file="main.tpl"}

{block name=footer}
<!-- Footer -->
    <ul class="copyright">
        Autor: Kamil Horzela
        <li>&copy; Untitled. All rights reserved.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
    </ul>

{/block}

        
        

{block name=content}
    <div id="main" class="wrapper style1">
    <div class="container">
        <section>
            <form action="{$conf->action_url}login" method="post">
                <fieldset>
                <div class="form">
                    <input type="text" name="login" id="id_login"  placeholder="Login" />
                    <input type="password"  name="pass" id="id_pass" placeholder="Hasło" />
                    <ul class="actions">
                        <li><input style="margin-top: 1em;" type="submit" value="Zaloguj" class="primary" /></li>
                    </ul>
                </fieldset>
            </form>
</div>
    
   {include file='messages.tpl'}

    {/block}