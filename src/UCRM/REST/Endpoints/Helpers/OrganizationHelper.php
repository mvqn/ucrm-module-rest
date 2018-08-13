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
    // =================================================================================================================
    // HELPER METHODS
    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @param string $name
     * @return null|Organization
     * @throws \MVQN\Annotations\AnnotationReaderException
     * @throws \MVQN\Collections\CollectionException
     * @throws \MVQN\Helpers\ArrayHelperPathException
     * @throws \MVQN\Helpers\PatternMatchException
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
     * @throws \MVQN\Annotations\AnnotationReaderException
     * @throws \MVQN\Collections\CollectionException
     * @throws \MVQN\Helpers\ArrayHelperPathException
     * @throws \MVQN\Helpers\PatternMatchException
     * @throws \ReflectionException
     */
    public static function getByDefault(): ?Organization
    {
        $organizations = Organization::get();

        /** @var Organization $organization */
        $organization = $organizations->where("selected", true)->first();
        return $organization;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @return Country
     * @throws RestClientException
     * @throws \MVQN\Annotations\AnnotationReaderException
     * @throws \MVQN\Helpers\ArrayHelperPathException
     * @throws \MVQN\Helpers\PatternMatchException
     * @throws \ReflectionException
     */
    public function getCountry(): Country
    {
        if($this->countryId !== null)
            $country = Country::getById($this->countryId);

        /** @var Country $country */
        return $country;
    }

    /**
     * @param Country $country
     * @return Organization
     */
    public function setCountry(Country $country): Organization
    {
        $this->countryId = $country->getId();

        /** @var Organization $this */
        return $this;
    }


    /**
     * @return State
     * @throws RestClientException
     * @throws \MVQN\Annotations\AnnotationReaderException
     * @throws \MVQN\Helpers\ArrayHelperPathException
     * @throws \MVQN\Helpers\PatternMatchException
     * @throws \ReflectionException
     */
    public function getState(): State
    {
        if($this->stateId !== null)
            $state = State::getById($this->stateId);

        /** @var State $state */
        return $state;
    }

    /**
     * @param State $state
     * @return Organization
     */
    public function setState(State $state): Organization
    {
        $this->countryId = $state->getId();

        /** @var Organization $this */
        return $this;
    }

}