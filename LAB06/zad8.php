<html lang="en">

<body>
<img src="https://tuzwierzaki.pl/data/include/cms/Blog/Kapibara/Kapibara-odpoczywa.webp" width="300" height="300">
<?php if(rng()) : ?>
<img src="https://cdn11.bigcommerce.com/s-kc25pb94dz/images/stencil/1280x1280/products/271/762/Carrot__40927.1634584458.jpg?c=2" width="300" height="300">
<?php endif; ?>
</body>


</html>



<?php
function rng(){
    $rng = rand(1,10);
    if ($rng <= 6){
        return true;
    }
    else{return false;}
}

?>