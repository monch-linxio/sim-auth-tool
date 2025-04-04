<?php require_once 'header.php'; ?>
<body>
    <div class="wrapper">
        <?php require_once 'menu.php'; ?>
        
        <div class="main-content">
            <div class="container">
                <h3 class="text-center">Linxio Support</h3>
                
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h4>User Details</h4>
                        <table class="table table-striped">
                            <tbody>
                                <tr>
                                    <th>Name:</th>
                                    <td><?php echo $_SESSION['loggedUser']['name']; ?></td>
                                </tr>
                                <tr>
                                    <th>Username:</th>
                                    <td><?php echo $_SESSION['loggedUser']['username']; ?></td>
                                </tr>
                                <tr>
                                    <th>User ID:</th>
                                    <td><?php echo $_SESSION['loggedUser']['uid']; ?></td>
                                </tr>
                                <tr>
                                    <th>Account ID:</th>
                                    <td><?php echo $_SESSION['loggedUser']['accountId']; ?></td>
                                </tr>
                                <tr>
                                    <th>Customer ID:</th>
                                    <td><?php echo $_SESSION['loggedUser']['customerId']; ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php require_once 'footer.php'; ?>
