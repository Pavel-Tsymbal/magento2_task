<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace MyCompany\ExampleAdminNewPage\Block\Html;

use Magento\Framework\View\Element\Template;

/**
 * Html page title block
 *
 * @method $this setTitleId($titleId)
 * @method $this setTitleClass($titleClass)
 * @method string getTitleId()
 * @method string getTitleClass()
 * @api
 * @since 100.0.2
 */
class ReviewsCount extends Template
{
    /**
     * \Magento\Framework\Registry $registry
     */
    protected $registry;

    /**
     * \Magento\Review\Model\ReviewFactory $reviewFactory
     */
    protected $_reviewFactory;

    /**
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param \Magento\Review\Model\ReviewFactory $reviewFactory,
     * @param \Magento\Framework\Registry $registry
     * @param array $data
     */
    public function __construct(Template\Context $context,
                                \Magento\Review\Model\ReviewFactory $reviewFactory,
                                \Magento\Framework\Registry $registry,
                                array $data = [])
    {
        parent::__construct($context, $data);
        $this->_reviewFactory = $reviewFactory;
        $this->registry = $registry;
    }

    /**
     *
     * @return @return \Magento\Catalog\Model\Product
     */
    public function getCurrentProduct()
    {
        return $this->registry->registry('current_product');
    }

    /**
     * Get total reviews
     *
     * @param int $entityPkValue
     * @return int
     */
    public function getTotalReviews($id)
    {
        return $this->_reviewFactory->create()->getTotalReviews($id, false, $this->_storeManager->getStore()->getId());
    }
}