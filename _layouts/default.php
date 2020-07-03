<!DOCTYPE html>
<html lang="{{ page.lang | default: site.lang | default: 'fr' }}">

  {%- include head.html -%}
<?php
$count = 20;
function fetch_rand()
{
    $images = glob('imgs/*.*');
    $rand = array_rand($images);
    return $images[$rand];
}

$my_list = array();
$i = 0;
while($i<$count)
{
    $select = fetch_rand();
    if(!in_array($select,$my_list))
    {
        array_push($my_list,$select);
        $i++;
    }
}

print_r($my_list); 

foreach($my_list as $image)
{
    $image_link = explode('.',end(explode('/',$image)));
    $image_link = $image_link[0];
   // echo $image_link;
    ?>


  <body style="background-image:url("<?php echo $image; ?>");">
      <div class="tile">
    <a class="tile-inner" href="imgs/<?php echo $image_link; ?>">
        <img class="item" src="<?php echo $image; ?>" />
    </a>
    </div>
    <?php
}
?>
	<input class="ouverture-sac-checkbox sr-only" id="ouverture-sac" type="checkbox">
	<div class="theme-container grow">
	{%- include header.html -%}

 <main class="page-content" aria-label="Content">

	<div class="gauche">
		<div class="contenucolonnes">
			<div class="navsmart">
		{%- include nav.html -%}
		</div>
        {{ content }}
		</div>
	</div>
		
		
	<div class="droite">
		<div class="contenucolonnes">
		<div class="navscreen">
		{%- include nav.html -%}
			</div>
		<label class="ouverture-sac-label" for="ouverture-sac">
			<img src="{{site.icourl | relative_url}}/sac.gif" class="sacferme">
			<div class="sacouvert">x</div>
		</label>
		
		<div class="inventaire">
		
		
		{%- if site.posts.size > 0 -%}
		
			  {%- for post in site.posts -%}   
				  <a class="post-link" href="{{ post.url | relative_url }}">
					<img class="icone-post" src="{{ post.icone | relative_url }}" alt="">
				  </a>
			  {%- endfor -%}
		{%- endif -%}
		</div>
		</div>
	</div>	
	
</main>


	</div>
  </body>
  <script>
document.addEventListener('DOMContentLoaded', function () {
  const checkbox = document.querySelector('.ouverture-sac-checkbox');

  checkbox.checked = localStorage.getItem('ouvertureSac') === 'true';

  checkbox.addEventListener('change', function (event) {
    localStorage.setItem('ouvertureSac', event.currentTarget.checked);
  });
});
</script>
</html>
