<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints\Helpers\Common;

use MVQN\Annotations\Exceptions\AnnotationReaderException;
//use MVQN\Collections\Exceptions\CollectionException;
use MVQN\Helpers\Exceptions\ArrayHelperException;
use MVQN\Helpers\Exceptions\PatternMatchException;

use UCRM\REST\Exceptions\RestClientException;
use UCRM\REST\Endpoints\Exceptions\EndpointException;

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
     * @throws AnnotationReaderException
     * @throws ArrayHelperException
     * @throws EndpointException
     * @throws PatternMatchException
     * @throws RestClientException
     * @throws \ReflectionException
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
