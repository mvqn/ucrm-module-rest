<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints\Helpers\Common;

use UCRM\REST\Endpoints\Site;

/**
 * Trait SiteHelpers
 *
 * @package UCRM\REST\Endpoints\Helpers\Common
 * @author Ryan Spaeth <rspaeth@mvqn.net>
 */
trait SiteHelpers
{
    // =================================================================================================================
    // COMMON HELPERS
    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @return Site|null
     * @throws \MVQN\Annotations\Exceptions\AnnotationReaderException
     * @throws \MVQN\Helpers\Exceptions\ArrayHelperException
     * @throws \MVQN\Helpers\Exceptions\PatternMatchException
     * @throws \ReflectionException
     * @throws \UCRM\REST\Endpoints\Exceptions\EndpointException
     * @throws \UCRM\REST\Exceptions\RestClientException
     */
    public function getSite(): ?Site
    {
        if(property_exists($this, "siteId") && $this->{"siteId"} !== null)
            $site = Site::getById($this->{"siteId"});

        /** @var Site $site */
        return $site;
    }

    /**
     * @param Site $value
     * @return self Returns the appropriate Endpoint instance, for method chaining purposes.
     */
    public function setSite(Site $value): self
    {
        $this->{"siteId"} = $value->getId();

        /** @var self $this */
        return $this;
    }

}
