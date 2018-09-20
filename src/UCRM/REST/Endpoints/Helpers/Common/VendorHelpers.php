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
     * @throws \Exception
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
