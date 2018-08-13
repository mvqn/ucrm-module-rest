<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints\Helpers\Common;

use UCRM\REST\Endpoints\Endpoint;
use UCRM\REST\Endpoints\Organization;
use UCRM\REST\Endpoints\ServicePlan;

trait OrganizationHelpers
{
    // =================================================================================================================
    // HELPER METHODS
    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @return null|Organization
     * @throws \MVQN\Annotations\AnnotationReaderException
     * @throws \MVQN\Helpers\ArrayHelperPathException
     * @throws \MVQN\Helpers\PatternMatchException
     * @throws \ReflectionException
     * @throws \UCRM\REST\Exceptions\RestClientException
     */
    public function getOrganization(): ?Organization
    {
        if (property_exists($this, "organizationId") && $this->{"organizationId"} !== null)
            $organization = Organization::getById($this->organizationId);

        /** @var Organization $organization */
        return $organization;
    }

    /**
     * @param Organization $value
     * @return self Returns the appropriate Endpoint instance, for method chaining purposes.
     */
    public function setOrganization(Organization $value): self
    {
        $this->{"organizationId"} = $value->getId();

        /** @var self $this */
        return $this;
    }

    /**
     * @param string $name
     * @return self
     * @throws \MVQN\Annotations\AnnotationReaderException
     * @throws \MVQN\Collections\CollectionException
     * @throws \MVQN\Helpers\ArrayHelperPathException
     * @throws \MVQN\Helpers\PatternMatchException
     * @throws \ReflectionException
     */
    public function setOrganizationByName(string $name): self
    {
        /** @var Organization $organization */
        $organization = Organization::getByName($name);
        $this->{"organizationId"} = $organization->getId();

        /** @var self $this */
        return $this;
    }

    /**
     * @return self
     * @throws \MVQN\Annotations\AnnotationReaderException
     * @throws \MVQN\Collections\CollectionException
     * @throws \MVQN\Helpers\ArrayHelperPathException
     * @throws \MVQN\Helpers\PatternMatchException
     * @throws \ReflectionException
     */
    public function setOrganizationByDefault(): self
    {
        /** @var Organization $organization */
        $organization = Organization::getByDefault();
        $this->{"organizationId"} = $organization->getId();

        /** @var self $this */
        return $this;
    }


}