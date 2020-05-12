<?php include_once '../inc/header.php' ?>
<?php include_once '../inc/nav.php' ?>

<h2 class="my-4 text-info text-center">User-defined functions</h2>


<h4 class="py-2 pl-5 pr-2 bg-info d-inline-block">HTML Forms (GET and POST) </h4>


<p class="bg-warning text-white p-3">
    Note: Dots and spaces in variable names are converted to underscores. For example &lt;input name="a.b" /&gt; becomes $_REQUEST["a_b"].
</p>



<pre class="bg-dark p-3 text-white">
    print_r($_POST, true));
     [beer] => Array
        (
            [0] => guinness
        )
    &lt;select multiple name="beer[]"&gt;
        &lt;option value="warthog"&gt;Warthog&lt;/option&gt;
        &lt;option value="guinness"&gt;Guinness&lt;/option&gt;
        &lt;option value="stuttgarter"&gt;Stuttgarter Schwabenbräu&lt;/option&gt;
    &lt;/select&gt;
</pre>





<a class="btn btn-outline-warning" target="_blank" href="https://www.php.net/manual/en/language.variables.external.php">user contributions note</a>


<?php include_once '../inc/footer.php' ?>
