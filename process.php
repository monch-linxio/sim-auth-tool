<?php
require 'classes/users/usersClass.php';
require 'classes/products/productsResolver.php';

class processData
{
    /**
     * Login
     *
     * @param $postData
     * @return void
     */
    public function login($postData): void
    {
        $details = [$postData['username'], md5($postData['password'])];

        $userObj = new usersClass();
        $result = $userObj->login($details);

        if (count($result) > 0) {
            $_SESSION['loggedUser'] = json_encode(['name' => $result['name'], 'username' => $result['login'], 'uid' => $result['id']]);
            header('Location:/');
        } else {
            echo '<script type="text/javascript">alert("This user is not registered.");location.href="index.php";</script>';
        }
    }

    /**
     * Product List
     *
     * @return array|null
     */
    public function productList(): ?array
    {
        $order      = 'ORDER BY product_name ASC';
        $productObj = new productsResolver($order);

        return $productObj->returnProductList();
    }

    /**
     * Add Product
     *
     * @param array $postData
     * @return int|null
     */
    public function addProduct(array $postData): ?int
    {
        $order = '';
        $productObj = new productsResolver($order);

        return $productObj->addProduct($postData);
    }

    /**
     * Product Details
     *
     * @param int $id
     * @return array|null
     */
    public function productDetails(int $id): ?array
    {
        $order      = '';
        $productObj = new productsResolver($order);

        return $productObj->returnProductDetails($id);
    }

    /**
     * Delete Product
     *
     * @param int $id
     * @return array
     */
    public function deleteProduct(int $id): array
    {
        $order      = '';
        $productObj = new productsResolver($order);

        return $productObj->deleteProduct($id);
    }
}