<main class="pb-5">
    <div class="container mt-5">
        <div class="box-form mx-auto p-3" style="width: 50%;border: 1px solid black; ">
            <h2 class="text-center mb-4">Sign in</h2>
            <form action="index.php?act=dangkiuser" method="post" id="fname" onsubmit="return checkSignin(this)">
                <div class="form-group mb-3">
                    <label for="my-input">Họ tên:</label>
                    <input id="my-input" class="form-control" type="text" name="hoten">
                </div>
                <div class="form-group mb-3">
                    <label for="my-input">Số điện thoại:</label>
                    <input id="my-input" class="form-control" type="text" name="sdt">
                </div>
                <div class="form-group mb-3">
                    <label for="my-input">Email:</label>
                    <input id="my-input" class="form-control" type="text" name="email">
                </div>
                <div class="form-group mb-3">
                    <label for="my-input">User:</label>
                    <input id="my-input" class="form-control" type="text" name="user">
                </div>
                <div class="form-group mb-3">
                    <label for="my-input">Password:</label>
                    <input id="my-input" class="form-control" type="text" name="pass">
                </div>
                <input type="submit" name="dangki" value="Submit" class="btn btn-dark mx-auto">
            </form>
        </div>
    </div>
</main>