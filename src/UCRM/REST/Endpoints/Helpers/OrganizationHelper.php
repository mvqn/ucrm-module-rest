<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints\Helpers;

// Collections
use UCRM\REST\Endpoints\Collections\OrganizationCollection;

// Endpoints
use UCRM\REST\Endpoints\Organization;

/**
 * Trait OrganizationHelper
 *
 * @package UCRM\REST\Endpoints\Helpers
 * @author Ryan Spaeth <rspaeth@mvqn.net>
 */
trait OrganizationHelper
{
    use Common\AddressHelpers;
    use Common\CountryHelpers;
    use Common\StateHelpers;

    // =================================================================================================================
    // OBJECT METHODS
    // -----------------------------------------------------------------------------------------------------------------

    // =================================================================================================================
    // CREATE METHODS
    // -----------------------------------------------------------------------------------------------------------------

    // =================================================================================================================
    // READ METHODS
    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @param string $name
     * @return OrganizationCollection
     * @throws \Exception
     */
    public static function getByName(string $name): OrganizationCollection
    {
        $organizations = Organization::get();

        /** @var OrganizationCollection $organizations */
        $organizations = $organizations->where("name", $name);
        return new OrganizationCollection($organizations->elements());
    }

    /**
     * @return null|Organization
     * @throws \Exception
     */
    public static function getByDefault(): ?Organization
    {
        $organizations = Organization::get();

        /** @var Organization $organization */
        $organization = $organizations->where("selected", true)->first();
        return $organization;
    }

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