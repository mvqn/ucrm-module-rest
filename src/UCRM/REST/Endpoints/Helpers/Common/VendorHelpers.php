<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints\Helpers\Common;

use UCRM\REST\Endpoints\Vendor;

/**
 * Trait VendorHelpers
 *
 * @package UCRM\REST\Endpoints\Helpers\Common
 * @author Ryan Spaeth <rspaeth@mvqn.net>
 */
trait VendorHelpers
{
    // =================================================================================================================
    // COMMON HELPERS
    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @return Vendor|null
     * @throws \MVQN\Annotations\Exceptions\AnnotationReaderException
     * @throws \MVQN\Helpers\Exceptions\ArrayHelperException
     * @throws \MVQN\Helpers\Exceptions\PatternMatchException
     * @throws \ReflectionException
     * @throws \UCRM\REST\Endpoints\Exceptions\EndpointException
     * @throws \UCRM\REST\Exceptions\RestClientException
     */
    public function getVendor(): ?Vendor
    {
        if(property_exists($this, "vendorId") && $this->{"vendorId"} !== null)
            $vendor = Vendor::getById($this->{"vendorId"});

        /** @var Vendor $vendor */
        return $vendor;
    }

    /**
     * @param Vendor $value
     * @return self Returns the appropriate Endpoint instance, for method chaining purposes.
     */
    public function setVendor(Vendor $value): self
    {
        $this->{"vendorId"} = $value->getId();

        /** @var self $this */
        return $this;
    }

}
