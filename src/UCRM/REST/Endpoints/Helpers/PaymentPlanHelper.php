<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints\Helpers;

use MVQN\Annotations\AnnotationReaderException;
use MVQN\Collections\Collection;
use MVQN\Helpers\ArrayHelperPathException;
use MVQN\Helpers\PatternMatchException;
use UCRM\REST\Endpoints\Currency;
use UCRM\REST\Endpoints\Invoice;
use UCRM\REST\Endpoints\PaymentCover;
use UCRM\REST\Endpoints\User;
use UCRM\REST\Exceptions\RestObjectException;

use UCRM\REST\Endpoints\Endpoint;
use UCRM\REST\Endpoints\Organization;
use UCRM\REST\Endpoints\Client;
use UCRM\REST\Endpoints\Country;
use UCRM\REST\Endpoints\State;
use UCRM\REST\Endpoints\PaymentPlan;


trait PaymentPlanHelper
{
    use Common\ClientHelpers;
    use Common\CurrencyHelpers;

    // =================================================================================================================
    // CREATE
    // -----------------------------------------------------------------------------------------------------------------

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





    public function insert(): PaymentPlan
    {
        /** @var PaymentPlan $data */
        $data = $this;

        /** @var PaymentPlan $result */
        $result = PaymentPlan::post($data);
        return $result;
    }






}