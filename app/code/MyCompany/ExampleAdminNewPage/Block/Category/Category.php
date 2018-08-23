<?php

namespace MyCompany\ExampleAdminNewPage\Block\Category;

class Category extends \Magento\Framework\View\Element\Template
{
    /**
     * \Magento\Catalog\Helper\Category $categoryHelper
     */
    protected $_categoryHelper;

    /**
     * \Magento\Catalog\Helper\Category $categoryHelper
     */
    protected $_catalogLayer;

    /**
     * \Magento\Catalog\Model\ResourceModel\Category\CollectionFactory $categoryCollection
     */
    protected $_categoryCollection;

    /**
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param \Magento\Catalog\Helper\Category $categoryHelper
     * @param \Magento\Catalog\Model\ResourceModel\Category\CollectionFactory $categoryCollection
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Catalog\Helper\Category $categoryHelper,
        \Magento\Catalog\Model\ResourceModel\Category\CollectionFactory $categoryCollection,
        $data = []
    ) {
        $this->_categoryHelper = $categoryHelper;
        $this->_categoryCollection = $categoryCollection;
        parent::__construct($context,$data);
    }

    /**
     * Retrieve current store categories
     *
     * @return \Magento\Catalog\Model\Resource\Category\Collection|array
     */
    public function getCategoryCollection()
    {
        $collection = $this->_categoryCollection->create()
            ->addAttributeToSelect('*')
            ->setStore($this->_storeManager->getStore())
            ->addAttributeToFilter('name', array('like' => '%a%'));

        return $collection;
    }
}