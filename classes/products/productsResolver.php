<?php

use classes\products\resolvers\productsClass\productsClass;

require_once 'classes/products/resolvers/productsClass.php';

class productsResolver
{
    /**
     * @var string $order
     */
    protected string $order;

    /**
     * Products Resolver Constructor
     *
     * @param string $order
     */
    public function __construct(string $order)
    {
        $this->order = $order;
    }

    /**
     * @param string $order
     * @return self
     */
    public static function withNew(string $order): self
    {
        return new static($order);
    }

    /**
     * Return Product List
     *
     * @return array|null
     */
    public function returnProductList(): ?array
    {
        $list = new productsClass();

        return $list->getList($this->order);
    }

    /**
     * Return Product Details
     *
     * @param int $id
     * @return array|null
     */
    public function returnProductDetails(int $id): ?array
    {
        $product = new productsClass();

        return $product->getProductDetails($id);
    }

    /**
     * Add New Product
     *
     * @param array $postData
     * @return int
     */
    public function addProduct(array $postData): int
    {
        $product = new productsClass();

        return $product->insertNew($postData);
    }

    /**
     * Delete Product
     *
     * @param int $id
     * @return array
     */
    public function deleteProduct(int $id): array
    {
        $delete = new productsClass();

        return $delete->removeProduct($id);
    }
}