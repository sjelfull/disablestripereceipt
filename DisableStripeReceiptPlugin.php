<?php
/**
 * Disable Stripe Receipt plugin for Craft CMS
 *
 * This plugin does one thing: disables Stripe receipt e-mail when using Stripe with Commerce.
 *
 * @author    Fred Carlsen
 * @copyright Copyright (c) 2017 Fred Carlsen
 * @link      https://superbig.co
 * @package   DisableStripeReceipt
 * @since     1.0.0
 */

namespace Craft;

class DisableStripeReceiptPlugin extends BasePlugin
{
    /**
     * @return mixed
     */
    public function init()
    {
        parent::init();
    }

    /**
     * @return mixed
     */
    public function getName()
    {
         return Craft::t('Disable Stripe Receipt');
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return Craft::t('This plugin does one thing: disables Stripe receipt e-mail when using Stripe with Commerce.');
    }

    /**
     * @return string
     */
    public function getDocumentationUrl()
    {
        return 'https://github.com/sjelfull/disablestripereceipt/blob/master/README.md';
    }

    /**
     * @return string
     */
    public function getReleaseFeedUrl()
    {
        return 'https://raw.githubusercontent.com/sjelfull/disablestripereceipt/master/releases.json';
    }

    /**
     * @return string
     */
    public function getVersion()
    {
        return '1.0.0';
    }

    /**
     * @return string
     */
    public function getSchemaVersion()
    {
        return '1.0.0';
    }

    /**
     * @return string
     */
    public function getDeveloper()
    {
        return 'Superbig';
    }

    /**
     * @return string
     */
    public function getDeveloperUrl()
    {
        return 'https://superbig.co';
    }

    public function commerce_modifyGatewayRequestData($data)
    {
        // Disable email receipts
        if (array_key_exists("receipt_email", $data)) {
            unset($data["receipt_email"]);
        }

        return $data;
    }
}