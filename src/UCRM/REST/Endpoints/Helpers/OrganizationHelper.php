<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints\Helpers;

use MVQN\Collections\Collection;

use UCRM\REST\Exceptions\RestClientException;

use UCRM\REST\Endpoints\{Organization,Country,State};
use UCRM\REST\Endpoints\Exceptions\EndpointException;

/**
 * Trait OrganizationHelper
 *
 * @package UCRM\REST\Endpoints\Helpers
 * @author Ryan Spaeth <rspaeth@mvqn.net>
 */
trait OrganizationHelper
{
    use Common\CountryHelpers;
    use Common\StateHelpers;

    // =================================================================================================================
    // HELPER METHODS
    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @param string $name
     * @return null|Organization
     * @throws EndpointException
     * @throws RestClientException
     * @throws \MVQN\Annotations\Exceptions\AnnotationReaderException
     * @throws \MVQN\Collections\Exceptions\CollectionException
     * @throws \MVQN\Helpers\Exceptions\PatternMatchException
     * @throws \ReflectionException
     */
    public static function getByName(string $name): ?Organization
    {
        $organizations = Organization::get();

        /** @var Organization $organization */
        $organization = $organizations->where("name", $name)->first();
        return $organization;
    }

    /**
     * @return null|Organization
     * @throws EndpointException
     * @throws RestClientException
     * @throws \MVQN\Annotations\Exceptions\AnnotationReaderException
     * @throws \MVQN\Collections\Exceptions\CollectionException
     * @throws \MVQN\Helpers\Exceptions\PatternMatchException
     * @throws \ReflectionException
     */
    public static function getByDefault(): ?Organization
    {
        $organizations = Organization::get();

        /** @var Organization $organization */
        $organization = $organizations->where("selected", true)->first();
        return $organization;
    }



}