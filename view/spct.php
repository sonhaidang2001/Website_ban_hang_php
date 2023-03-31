<main>
    <div class="container p-3">
        <div class="row">

            <div class="col-sm-6">
                <img src="./uploads/<?= $kq[0]['img'] ?>" class="" style="width: 223px;height: 334.5px; float: right;"
                    alt="">
            </div>
            <div class="col-sm-6">
                <h2><?= $kq[0]['tensp'] ?></h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi veritatis dicta sit repellendus? Vero
                    assumenda esse inventore nemo, consectetur suscipit facere debitis atque! Rem, adipisci optio facere
                    quis iure iste.</p>
                <p><b>Giá</b>: <?= $kq[0]['gia'] ?></p>
                <form action="index.php?act=addcart" method="post">
                    <input type="number" name="sl" class="w-25" id="" max="50" min="1" value="1">
                    <input type="submit" value="Đặt hàng" name="addcart" class="btn btn-dark">

                    <input type="hidden" name="id" id="" value="<?= $kq[0]['id'] ?>">
                    <input type="hidden" name="tensp" id="" value="<?= $kq[0]['tensp'] ?>">
                    <input type="hidden" name="img" id="" value="<?= $kq[0]['img'] ?>">
                    <input type="hidden" name="gia" id="" value="<?= $kq[0]['gia'] ?>">
                </form>
            </div>
        </div>
    </div>
</main>