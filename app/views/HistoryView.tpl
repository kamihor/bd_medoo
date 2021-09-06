{extends file="main.tpl"}

{block name=footer}
<!-- Footer -->
    <ul class="copyright">
        Autor: Kamil Horzela
        <li>&copy; Untitled. All rights reserved.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
    </ul>

{/block}


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
    <div class="table-wrapper" style="margin: 10em">
    <table id="wynik" class="pure-table pure-table-bordered">
<thead>
	<tr>
		<th>L.p.</th>
		<th>Kwota</th>
		<th>Liczba lat</th>
		<th>Oprocentowanie</th>
                <th>Rata</th>
		<th>Data</th>
	</tr>
</thead>
<tbody>
{foreach $data as $d}
{strip}
	<tr>
		<td>{$d["idresult"]}</td>
		<td>{$d["value"]}</td>
		<td>{$d["years"]}</td>
                <td>{$d["percent"]}</td>
		<td>{$d["result"]|string_format:"%.2f"}</td>
		<td>{$d["date"]}</td>
	</tr>
{/strip}
{/foreach}
</tbody>
</table>
    </div>
    {/block}
        
      