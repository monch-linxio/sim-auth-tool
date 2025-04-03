<?php

namespace db\products;

use myDatabaseClass\myDatabaseClass;

/**
 * Products DB Methods
 */
class products extends myDatabaseClass
{
    /**
     * @var string $table
     */
    public const TABLE = 'products';

    /**
     * @var string $order
     */
    protected string $order;

    /**
     * Product DB Constructor
     *
     * @param string $order
     */
    public function __construct(string $order)
    {
        parent::__construct();

        $this->order = $order;
    }

    /**
     * Return Product List
     *
     * @return array|null
     */
    public function returnProductList(): ?array
    {
        return parent::query('SELECT * FROM '.self::TABLE.' '.$this->order)->fetchAll();
    }

    /**
     * Product Detail
     *
     * @param int $id
     *
     * @return array|null
     */
    public function productDetails(int $id): ?array
    {
        return parent::query('SELECT * FROM '.self::TABLE.' WHERE id = ?', $id)->fetchArray();
    }

    /**
     * Insert New Product
     *
     * @param array $postData
     * @return int
     */
    public function insertProduct(array $postData): int
    {
        $insData = [$postData['pname'], $postData['description'], NULL, $postData['isfeatured']];
        $query = 'INSERT INTO '.self::TABLE." (product_name, description, image, is_featured) VALUES (?,?,?,?)";

        return parent::query($query, $insData)->lastInsertID();
    }

    /**
     * Delete Product
     *
     * @param int $id
     *
     * @return int
     */
    public function deleteProduct(int $id): int
    {
        return parent::query('DELETE FROM '.self::TABLE.' WHERE id = ?', $id)->affectedRows();
    }
}