<?php require_once('header.php'); ?>
    <body>
    <div class="divider"></div>
    <div class="container">
        <h3>Product Details</h3>
        <div class="">
            <form method="post" action="">
                <div class="form-group">
                    <label>Product Name</label>
                    <input type="text" name="pname" class="form-control" required="required" value="<?php echo $productDetails['product_name'];?>" />
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" class="form-control"><?php echo $productDetails['description'];?></textarea>
                </div>
                <div class="form-group">
                    <label>Image</label>
                    <img src="/assets/products/<?php echo $productDetails['image'];?>" />
                </div>
                <div class="form-group">
                    <label>Featured</label>
                    <input type="checkbox" name="isfeatured" <?php $productDetails['is_featured'] == 1 ? 'checked' : '';?> value="1" />
                </div>
                <div class="form-group">
                    <input type="submit" name="update" class="btn btn-primary" value="Update" />
                </div>
            </form>
        </div>
    </div>
<?php require_once('footer.php'); ?>