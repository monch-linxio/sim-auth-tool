<?php require_once 'header.php'; ?>
    <body>
<div class="divider"></div>
<div class="container">
    <?php require_once 'menu.php';?>
</div>
<div class="container">
    <div class="panel panel-default">
        <div class="panel-body">
        <?php print_r($_SESSION); ?>
        </div>
    </div>
</div>
<?php require_once 'footer.php'; ?>