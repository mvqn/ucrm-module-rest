<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints\Helpers\Common;

use UCRM\REST\Endpoints\Refund;

/**
 * Trait RefundHelpers
 * @package UCRM\REST\Endpoints\Helpers\Common
 * @author Ryan Spaeth <rspaeth@mvqn.net>
 */
trait RefundHelpers
{
    // =================================================================================================================
    // HELPER METHODS
    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @return Refund
     * @throws \MVQN\Annotations\Exceptions\AnnotationReaderException
     * @throws \MVQN\Helpers\Exceptions\ArrayHelperException
     * @throws \MVQN\Helpers\Exceptions\PatternMatchException
     * @throws \ReflectionException
     * @throws \UCRM\REST\Endpoints\Exceptions\EndpointException
     * @throws \UCRM\REST\Exceptions\RestClientException
     */
    public function getRefund(): Refund
    {
        if(property_exists($this, "refundId") && $this->{"refundId"} !== null)
            $refund = Refund::getById($this->{"refundId"});

        /** @var Refund $refund */
        return $refund;
    }

    /**
     * @param Refund $value
     * @return self Returns the appropriate Endpoint instance, for method chaining purposes.
     */
    public function setRefund(Refund $value): self
    {
        $this->{"refundId"} = $value->getId();

        /** @var self $this */
        return $this;
    }

}
