<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints\Helpers;

use UCRM\REST\Endpoints\Collections\TaxCollection;
use UCRM\REST\Endpoints\Endpoint;
use UCRM\REST\Endpoints\Tax;

trait TaxHelper
{

    // =================================================================================================================
    // CRUD FUNCTIONS
    // -----------------------------------------------------------------------------------------------------------------

    public function insert(): Tax
    {
        /** @var Endpoint $data */
        $data = $this;

        /** @var Tax $result */
        $result = Tax::post($data);
        return $result;
    }

    public static function create(string $name, float $rate, string $agencyName = null): Tax
    {
        $data = new Tax([
            "name" => $name,
            "rate" => $rate,
            "agencyName" => $agencyName
        ]);

        /** @var Tax $result */
        $result = Tax::post($data);
        return $result;
    }




    // =================================================================================================================
    // EXTRA FUNCTIONS
    // -----------------------------------------------------------------------------------------------------------------





}