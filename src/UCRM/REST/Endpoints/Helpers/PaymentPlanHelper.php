<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints\Helpers;

use MVQN\Annotations\Exceptions\AnnotationReaderException;
use MVQN\Collections\Exceptions\CollectionException;
use MVQN\Helpers\Exceptions\ArrayHelperException;
use MVQN\Helpers\Exceptions\PatternMatchException;

use UCRM\REST\Endpoints\Exceptions\EndpointException;
use UCRM\REST\Exceptions\RestClientException;

use UCRM\REST\Endpoints\Client;
use UCRM\REST\Endpoints\PaymentPlan;


trait PaymentPlanHelper
{
    use Common\ClientHelpers;
    use Common\CurrencyHelpers;

    // =================================================================================================================
    // CREATE
    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @param Client $client
     * @param \DateTime $startDate
     * @param float $amount
     * @return PaymentPlan
     * @throws AnnotationReaderException
     * @throws CollectionException
     * @throws EndpointException
     * @throws PatternMatchException
     * @throws RestClientException
     * @throws \ReflectionException
     */
    public static function createMonthly(Client $client, \DateTime $startDate, float $amount): PaymentPlan
    {
        $paymentPlan = (new PaymentPlan())
            ->setProvider(PaymentPlan::PROVIDER_IPPAY)
            ->setProviderPlanId("")
            ->setProviderSubscriptionId("")
            ->setClient($client)
            ->setCurrencyByCode("USD")
            ->setAmount($amount)
            ->setPeriod(PaymentPlan::PERIOD_MONTHS_1)
            ->setStartDate($startDate);

        return $paymentPlan;
    }


    /**
     * @return PaymentPlan
     * @throws AnnotationReaderException
     * @throws ArrayHelperException
     * @throws EndpointException
     * @throws PatternMatchException
     * @throws RestClientException
     * @throws \ReflectionException
     */
    public function insert(): PaymentPlan
    {
        /** @var PaymentPlan $data */
        $data = $this;

        /** @var PaymentPlan $result */
        $result = PaymentPlan::post($data);
        return $result;
    }






}