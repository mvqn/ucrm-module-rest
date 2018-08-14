<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints\Helpers\Common;

use UCRM\REST\Endpoints\Payment;

/**
 * Trait PaymentHelpers
 * @package UCRM\REST\Endpoints\Helpers\Common
 * @author Ryan Spaeth <rspaeth@mvqn.net>
 */
trait PaymentHelpers
{
    // =================================================================================================================
    // HELPER METHODS
    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @return Payment
     * @throws \MVQN\Annotations\Exceptions\AnnotationReaderException
     * @throws \MVQN\Helpers\Exceptions\ArrayHelperException
     * @throws \MVQN\Helpers\Exceptions\PatternMatchException
     * @throws \ReflectionException
     * @throws \UCRM\REST\Endpoints\Exceptions\EndpointException
     * @throws \UCRM\REST\Exceptions\RestClientException
     */
    public function getPayment(): Payment
    {
        if(property_exists($this, "paymentId") && $this->{"paymentId"} !== null)
            $payment = Payment::getById($this->{"paymentId"});

        /** @var Payment $payment */
        return $payment;
    }

    /**
     * @param Payment $value
     * @return self Returns the appropriate Endpoint instance, for method chaining purposes.
     */
    public function setPayment(Payment $value): self
    {
        $this->{"paymentId"} = $value->getId();

        /** @var self $this */
        return $this;
    }

}
