<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints\Helpers\Common;

use UCRM\REST\Endpoints\Endpoint;
use UCRM\REST\Endpoints\{Country,State};

trait InvoiceCountryHelpers
{
    // =================================================================================================================
    // HELPER METHODS
    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @return null|Country
     * @throws \MVQN\Annotations\AnnotationReaderException
     * @throws \MVQN\Helpers\ArrayHelperPathException
     * @throws \MVQN\Helpers\PatternMatchException
     * @throws \ReflectionException
     * @throws \UCRM\REST\Exceptions\RestClientException
     */
    public function getInvoiceCountry(): ?Country
    {
        if(property_exists($this, "invoiceCountryId") && $this->{"invoiceCountryId"} !== null)
            $country = Country::getById($this->{"invoiceCountryId"});

        /** @var Country $country */
        return $country;
    }

    /**
     * @param Country $value
     * @return self Returns the appropriate Endpoint instance, for method chaining purposes.
     */
    public function setInvoiceCountry(Country $value): self
    {
        $this->{"invoiceCountryId"} = $value->getId();

        /** @var self $this */
        return $this;
    }

    /**
     * @param string $name
     * @return self Returns the appropriate Endpoint instance, for method chaining purposes.
     * @throws \MVQN\Annotations\AnnotationReaderException
     * @throws \MVQN\Collections\CollectionException
     * @throws \MVQN\Helpers\ArrayHelperPathException
     * @throws \MVQN\Helpers\PatternMatchException
     * @throws \ReflectionException
     */
    public function setInvoiceCountryByName(string $name): self
    {
        /** @var Country $country */
        $country = Country::getByName($name)->first();
        $this->{"invoiceCountryId"} = $country->getId();

        /** @var self $this */
        return $this;
    }

    /**
     * @param string $code
     * @return self
     * @throws \MVQN\Annotations\AnnotationReaderException
     * @throws \MVQN\Collections\CollectionException
     * @throws \MVQN\Helpers\ArrayHelperPathException
     * @throws \MVQN\Helpers\PatternMatchException
     * @throws \ReflectionException
     */
    public function setInvoiceCountryByCode(string $code): self
    {
        /** @var Country $country */
        $country = Country::getByCode($code);
        $this->{"invoiceCountryId"} = $country->getId();

        /** @var self $this */
        return $this;
    }
}