<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints\Helpers;

// Core
use MVQN\Annotations\AnnotationReaderException;

// Exceptions
use UCRM\REST\RestObjectException;

// Lookups
use UCRM\REST\Endpoints\Lookups\PaymentCover;

// Endpoints
use UCRM\REST\Endpoints\Refund;

/**
 * Trait RefundHelper
 *
 * @package UCRM\REST\Endpoints\Helpers
 * @author Ryan Spaeth <rspaeth@mvqn.net>
 */
trait RefundHelper
{
    use Common\ClientHelpers;
    use Common\CurrencyHelpers;

    // =================================================================================================================
    // OBJECT METHODS
    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @param PaymentCover $paymentCover
     * @return Refund
     * @throws AnnotationReaderException
     * @throws RestObjectException
     * @throws \ReflectionException
     */
    public function addPaymentCover(PaymentCover $paymentCover): Refund
    {
        $this->paymentCovers[] = $paymentCover->toArray();

        /** @var Refund $this */
        return $this;
    }

    // =================================================================================================================
    // CREATE METHODS
    // -----------------------------------------------------------------------------------------------------------------

    // =================================================================================================================
    // READ METHODS
    // -----------------------------------------------------------------------------------------------------------------

    // =================================================================================================================
    // UPDATE METHODS
    // -----------------------------------------------------------------------------------------------------------------

    // =================================================================================================================
    // DELETE METHODS
    // -----------------------------------------------------------------------------------------------------------------

    // =================================================================================================================
    // EXTRA FUNCTIONS
    // -----------------------------------------------------------------------------------------------------------------

}