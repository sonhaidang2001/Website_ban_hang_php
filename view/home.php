<main class="py-5 ">
    <div class="container px-4 px-lg-5">
        <h1 class="text-center mb-4">New product</h1>
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            <?php
            showproduct($dssphome_new);
            ?>

        </div>
    </div>
    <div class="container px-4 px-lg-5">
        <h1 class="text-center mb-4">Featured Products
        </h1>
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            <?php
            showproduct($dssphome_view)
            // echo var_dump($dssphome_view);

            ?>

        </div>
    </div>

    <div class="container product_special">
        <div class="row">
            <?php

            echo '<div class="col-12 col-sm-5">
                            <img src="./uploads/' . $sphome_special[0]['img'] . '" alt="" class="w-50" style="position: relative; left:50% ;">
                      </div>
                      <div class="col-12 col-sm-7">
                            <h1>' . $sphome_special[0]['tensp'] . '</h1>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem consequatur reiciendis illum eum
                                magnam? Voluptatibus reiciendis praesentium perferendis unde fuga debitis deleniti magnam
                                dolores, numquam dolor, eligendi est! Error, eligendi.
                            </p>
                            <a href="index.php?act=allsanpham" class="btn btn-dark text-white">Show now</a>
                      </div>';

            ?>
        </div>
    </div>
</main>