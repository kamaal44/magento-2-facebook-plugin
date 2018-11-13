<?php
/**
 * Mageplaza
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Mageplaza.com license that is
 * available through the world-wide-web at this URL:
 * https://www.mageplaza.com/LICENSE.txt
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade this extension to newer
 * version in the future.
 *
 * @category    Mageplaza
 * @package     Mageplaza_FacebookWidget
 * @copyright   Copyright (c) Mageplaza (https://www.mageplaza.com/)
 * @license     https://www.mageplaza.com/LICENSE.txt
 */

namespace Mageplaza\FacebookWidget\Block;

use Magento\Framework\View\Element\Template;
use Magento\Widget\Block\BlockInterface;
use Mageplaza\FacebookWidget\Helper\Data as helperData;
use Magento\Framework\Locale\Resolver;

abstract class Facebook extends Template implements BlockInterface
{
    /**
     * @var helperData
     */
    protected $helperData;

    /**
     * @var Resolver
     */
    protected $locale;

    /**
     * Widget constructor.
     *
     * @param Template\Context $context
     * @param helperData $helperData
     * @param Resolver $resolver
     * @param array $data
     */
    public function __construct(
        Template\Context $context,
        helperData $helperData,
        Resolver $resolver,
        array $data = []
    )
    {
        $this->helperData = $helperData;
        $this->locale = $resolver;

        parent::__construct($context, $data);
    }

    public function getHelperData() {
        return $this->helperData;
    }

    /**
     * Get Language by storeId
     *
     * @return null|string
     */
    public function getLanguage() {
        $lang = $this->locale->getLocale();

        return $lang;
    }

    /**
     * @return mixed
     */
    public function getAppId()
    {
        $appId = $this->helperData->getConfigGeneral('app_id');

        return $appId;
    }

}