<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints\Helpers;

use UCRM\REST\Endpoints\Collections\InvoiceTemplateCollection;
use UCRM\REST\Endpoints\InvoiceTemplate;

trait InvoiceTemplateHelper
{

    // =================================================================================================================
    // CRUD FUNCTIONS
    // -----------------------------------------------------------------------------------------------------------------



    // =================================================================================================================
    // EXTRA FUNCTIONS
    // -----------------------------------------------------------------------------------------------------------------

    public static function getByName(string $name): InvoiceTemplateCollection
    {
        $invoiceTemplates = InvoiceTemplate::get()->where("name", $name);

        return new InvoiceTemplateCollection($invoiceTemplates->elements());
    }

}