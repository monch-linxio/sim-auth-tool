<?php require_once('header.php'); ?>
    <body>
    <div class="divider"></div>
    <div class="container">
        <h3>Add Product</h3>
        <div class="">
            <form method="post" action="">
                <div class="form-group">
                    <label>Product Name</label>
                    <input type="text" name="pname" class="form-control" required="required" value="" />
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label>Image</label>

                </div>
                <div class="form-group">
                    <label>Featured</label>
                    <input type="checkbox" name="isfeatured" value="1" />
                </div>
                <div class="form-group">
                    <input type="submit" name="add" class="btn btn-primary" value="Add" />
                </div>
            </form>
        </div>
    </div>
<?php require_once('footer.php'); ?>