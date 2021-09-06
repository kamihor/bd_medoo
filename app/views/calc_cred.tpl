{extends file="main.tpl"}

{block name=footer}
<!-- Footer -->
    <ul class="copyright">
        Autor: Kamil Horzela
        <li>&copy; Untitled. All rights reserved.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
    </ul>

{/block}

<h2 class="content-head is-center">Prosty kalkulator</h2>

{block name=content}
    <header id="header">
   
    <h1 style="white-space: nowrap;">
                <span style="white-space: nowrap;">użytkownik: {$user->login}, rola: {$user->role}</span>
            </h1>
            
            <nav id="nav">
        <ul>
             <li style="white-space: nowrap;">
                <a href="{$conf->action_url}calcShow" >Oblicz</a>
            </li>
            <li style="white-space: nowrap;">
                <a href="{$conf->action_url}history" >Historia</a>
            </li>
                        <li style="white-space: nowrap;">
                <a class="button primary" href="{$conf->action_url}logout" >wyloguj</a>
            </li>
        </ul>
        
    </nav>
            
    </header>
    
    
  
        
<div id="main" class="wrapper style1">
    <div class="container">
        <section>
            <form action="{$conf->action_root}calcCompute" method="post">
                <fieldset>
                <div class="form">
                    <input type="text" name="value" id="value" value="{$form->value}" placeholder="Kwota" />
                    <input type="text"  name="years" id="years" value="{$form->years}" placeholder="Okres spłaty w latach" />
                    <input type="text"  name="percent" id="percent" value="{$form->percent}" placeholder="Oprocentowanie" />
                    <ul class="actions">
                        <li><input style="margin-top: 1em;" type="submit" value="Oblicz" class="primary" /></li>
                    </ul>
                </fieldset>
            </form>
</div>
                    <div>        
            
{include file='messages.tpl'}



            {if isset($result->result)}
                <ol class="messbox">
            <h4>Miesięczna rata</h4>
            <p class="res">
                {$result->result|string_format:"%.2f"}
                zł
            </p>
            </ol>
            {/if}     


        </section>
    </div>
</div>
{/block}


<!-- Scripts -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/jquery.scrolly.min.js"></script>
<script src="assets/js/jquery.dropotron.min.js"></script>
<script src="assets/js/jquery.scrollex.min.js"></script>
<script src="assets/js/browser.min.js"></script>
<script src="assets/js/breakpoints.min.js"></script>
<script src="assets/js/util.js"></script>
<script src="assets/js/main.js"></script>
