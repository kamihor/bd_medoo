{if $messages->isError()}
                <ol class="messbox">
            {foreach $messages->getErrors() as $err}
            <ul class="alt">
                <li> {$err} </li>
            </ul>
            {/foreach}
            </ol>
            {/if}


        
                {if $messages->isInfo()}
                <ol class="messbox">
            {foreach $messages->getInfos() as $inf}
            <ul class="alt">
                <li> {$inf} </li>
            </ul>
            {/foreach}
            </ol>
            {/if}