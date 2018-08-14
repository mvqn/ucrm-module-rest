<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints\Helpers;


use UCRM\REST\Endpoints\{Collections\ClientContactCollection, Exceptions\EndpointException, Client, Invoice, Quote};
use UCRM\REST\Endpoints\Lookups\{ClientBankAccount,
    ClientContact,
    ClientContactAttribute,
    ClientContactType,
    ClientTag,
    InvoiceItem};


trait QuoteHelper
{
    use Common\ClientHelpers;
    use Common\QuoteTemplateHelpers;
    use Common\OrganizationCountryHelpers;
    use Common\OrganizationStateHelpers;
    use Common\ClientCountryHelpers;
    use Common\ClientStateHelpers;

    // =================================================================================================================
    // CRUD FUNCTIONS
    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @return Quote
     * @throws EndpointException
     * @throws \MVQN\Annotations\Exceptions\AnnotationReaderException
     * @throws \MVQN\Helpers\Exceptions\ArrayHelperException
     * @throws \MVQN\Helpers\Exceptions\PatternMatchException
     * @throws \ReflectionException
     * @throws \UCRM\REST\Exceptions\RestClientException
     */
    public function create(): Quote
    {
        /** @var Quote $data */
        $data = $this;

        /** @var Quote $quote */
        $quote = Quote::post($data, [ "clientId" => $this->getClientId() ]);

        return $quote;
    }

    /**
     * @return Quote
     * @throws EndpointException
     * @throws \MVQN\Annotations\Exceptions\AnnotationReaderException
     * @throws \MVQN\Helpers\Exceptions\ArrayHelperException
     * @throws \MVQN\Helpers\Exceptions\PatternMatchException
     * @throws \ReflectionException
     * @throws \UCRM\REST\Exceptions\RestClientException
     */
    public function update(): Quote
    {
        /** @var Quote $data */
        $data = $this;

        /** @var Quote $quote */
        $quote = Quote::patch($data, [ "id" => $this->getId() ]);

        return $quote;
    }

    // =================================================================================================================
    // EXTRA FUNCTIONS
    // -----------------------------------------------------------------------------------------------------------------




}