<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints\Helpers;


use MVQN\Annotations\AnnotationReaderException;
use MVQN\Common\ArraysException;
use MVQN\Common\PatternsException;
use UCRM\REST\Endpoints\{Quote, EndpointException};

use UCRM\REST\RestClientException;
use UCRM\REST\RestObjectException;


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
     * @throws AnnotationReaderException
     * @throws ArraysException
     * @throws EndpointException
     * @throws PatternsException
     * @throws RestClientException
     * @throws RestObjectException
     * @throws \ReflectionException
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
     * @throws AnnotationReaderException
     * @throws ArraysException
     * @throws EndpointException
     * @throws PatternsException
     * @throws RestClientException
     * @throws RestObjectException
     * @throws \ReflectionException
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