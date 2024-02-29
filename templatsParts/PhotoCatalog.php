<section class="alignForms">
<div class=blockForms>
<select name="event" class="forms">   
    <option value="categoriesPhoto">catégories</option>
    <option value="Reception">Réception</option>
    <option value="Mariage">Mariage</option>
    <option value="Concert" >Concert</option>
    <option value="Television" >Télévision</option>
</select>

<select name="format" class="forms">
    <option value="" disabled selected>Formats</option>
    <option value="paysage">paysage</option>
    <option value="portrait">portrait</option>
</select>
</div>

<div class=blockFormsForRight>
<select name="sort" class="forms">
    <option value="" disabled selected>Trier par</option>
    <option value="newest">plus récentes</option>
    <option value="oldest">plus anciennes</option>
</select>
</div>
</section>

<section class="picturesList">
<?php
$picsFolder = "/images/PhotosNMota";
$url = get_stylesheet_directory_uri() . $picsFolder;
$localPathFolder = get_stylesheet_directory() . $picsFolder;

if (is_dir($localPathFolder)){
    $files = scandir($localPathFolder);    
    foreach ($files as $file){
        
        if (in_array(pathinfo($file, PATHINFO_EXTENSION), ["jpg", "jpeg", "png"])) {
            echo '<img class="pictures" src="' . $url . '/' . $file . '" /><br>';
        }
    }
}
?>
</section>