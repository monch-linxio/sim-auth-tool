<?php

namespace classes\products\resolvers\productsClass;

use classes\products\abstractProductHandler\abstractProductHandler;
use db\products\products;

require_once 'classes/products/abstractProductHandler.php';
require_once 'db/products.php';

/**
 * Products Classes
 */
class productsClass extends abstractProductHandler
{
    /**
     * @var string $order
     */
    protected string $order = 'ORDER BY product_name ASC';

    /**
     * @var products $dbInstance
     */
    protected products $dbInstance;

    /**
     * Constructor
     */
    public function __construct() {
        parent::__construct($this->order);

        $this->dbInstance = new products($this->order);
    }

    /**
     * Get Product List
     *
     * @return self
     */
    protected function setData(): abstractProductHandler
    {
        $this->resultData = $this->dbInstance->returnProductList();

        return $this;
    }

    /**
     * Get Product Details
     *
     * @return self
     */
    protected function getData(): abstractProductHandler
    {
        $this->resultData = $this->dbInstance->productDetails($this->id);

        return $this;
    }

    /**
     * Add New Product
     *
     * @return abstractProductHandler
     */
    protected function addData(): abstractProductHandler
    {
        $this->id = $this->dbInstance->insertProduct($this->postData);

        return $this;
    }

    /**
     * Delete Product
     *
     * @return abstractProductHandler
     */
    protected function deleteData(): abstractProductHandler
    {
        $count = $this->dbInstance->deleteProduct($this->id);
        return $this;
    }
}