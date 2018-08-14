<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints\Helpers;

use UCRM\REST\Endpoints\Collections\QuoteTemplateCollection;
use UCRM\REST\Endpoints\QuoteTemplate;

trait QuoteTemplateHelper
{

    // =================================================================================================================
    // CRUD FUNCTIONS
    // -----------------------------------------------------------------------------------------------------------------



    // =================================================================================================================
    // EXTRA FUNCTIONS
    // -----------------------------------------------------------------------------------------------------------------

    public static function getByName(string $name): QuoteTemplateCollection
    {
        $invoiceTemplates = QuoteTemplate::get()->where("name", $name);

        return new QuoteTemplateCollection($invoiceTemplates->elements());
    }

}