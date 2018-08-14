<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints\Helpers;

use UCRM\REST\Endpoints\Lookups\PaymentCover;
use UCRM\REST\Endpoints\Refund;


trait RefundHelper
{
    use Common\ClientHelpers;
    use Common\CurrencyHelpers;

    // =================================================================================================================
    // HELPER METHODS
    // -----------------------------------------------------------------------------------------------------------------


    /**
     * @param PaymentCover $paymentCover
     * @return Refund
     * @throws \ReflectionException
     */
    public function addPaymentCover(PaymentCover $paymentCover): Refund
    {
        $this->paymentCovers[] = $paymentCover->toArray();

        /** @var Refund $this */
        return $this;
    }

}