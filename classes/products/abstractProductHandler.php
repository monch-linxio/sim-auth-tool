<?php

namespace classes\products\abstractProductHandler;


/**
 * Abstract Class for Product Handler
 */
abstract class abstractProductHandler
{
    /**
     * @var int $id
     */
    protected int $id;

    /**
     * @var string $order
     */
    protected string $order;

    /**
     * @var array $postData
     */
    protected array $postData;

    /**
     * @var array $resultData
     */
    protected array $resultData = [];

    /**
     *
     */
    public function __construct(string $order)
    {
        $this->order = $order;
    }

    /**
     * Bind Instance
     *
     * @param string $order
     * @return self
     */
    public static function newData(string $order): self
    {
        return new static($order);
    }

    /**
     * Return Data
     *
     * @param string $order
     * @return array|null
     */
    public function getList(string $order): ?array
    {
        return $this->setData()->response();
    }

    /**
     * Return Product Details
     *
     * @param int $id
     * @return array|null
     */
    public function getProductDetails(int $id): ?array
    {
        $this->id = $id;

        return $this->getData()->response();
    }

    public function insertNew(array $postData): int
    {
        $this->postData = $postData;

        return $this->addData()->insertResponse();
    }

    /**
     * Remove Product
     *
     * @param int $id
     * @return array
     */
    public function removeProduct(int $id): array
    {
        $this->id = $id;

        return $this->deleteData()->response();
    }

    /*
    |--------------------------------------------------------------------------
    | Abstract Methods
    |--------------------------------------------------------------------------
    |
    | Abstract methods required to be implemented by child classes
    |
    */

    /**
     * Set Data
     *
     * @return self
     */
    abstract protected function setData(): self;

    /**
     * Get Data
     *
     * @return self
     */
    abstract protected function getData(): self;

    /**
     * Add Product
     *
     * @return self
     */
    abstract protected function addData(): self;

    /**
     * Delete Data
     *
     * @return self
     */
    abstract protected function deleteData(): self;

    /*
    |--------------------------------------------------------------------------
    | Common Methods
    |--------------------------------------------------------------------------
    |
    | Common methods for child classes
    |
    */

    /**
     * Returns Response Container
     *
     * @return array
     */
    protected function response() :array
    {
        return $this->resultData;
    }

    protected function insertResponse(): int
    {
        return $this->id;
    }
}