<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints\Helpers\Common;

use UCRM\REST\Endpoints\Refund;

/**
 * Trait RefundHelpers
 *
 * @package UCRM\REST\Endpoints\Helpers\Common
 * @author Ryan Spaeth <rspaeth@mvqn.net>
 */
trait RefundHelpers
{
    // =================================================================================================================
    // HELPER METHODS
    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @return Refund|null
     * @throws \Exception
     */
    public function getRefund(): ?Refund
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
