<div class="heroHeader">
<?php    
$nbimages=15;
$nomimages[1]="nathalie-0.jpeg";
$nomimages[2]="nathalie-1.jpeg";
$nomimages[3]="nathalie-2.jpeg";
$nomimages[4]="nathalie-3.jpeg";
$nomimages[5]="nathalie-4.jpeg";
$nomimages[6]="nathalie-5.jpeg";
$nomimages[7]="nathalie-6.jpeg";
$nomimages[8]="nathalie-7.jpeg";
$nomimages[9]="nathalie-8.jpeg";
$nomimages[10]="nathalie-9.jpeg";
$nomimages[11]="nathalie-10.jpeg";
$nomimages[12]="nathalie-11.jpeg";
$nomimages[13]="nathalie-12.jpeg";
$nomimages[14]="nathalie-13.jpeg";
$nomimages[15]="nathalie-14.jpeg";

srand((double)microtime()*1000000);
$affimage=rand(1,$nbimages);
?>

<img class="heroHeader" src="<?php echo get_stylesheet_directory_uri() ?>/images/PhotosNMota/<?echo $nomimages[$affimage];?>">
                <img class="titleHeader" src="<?php echo get_stylesheet_directory_uri() ?>/images/TitreHeader.png">
            </div>