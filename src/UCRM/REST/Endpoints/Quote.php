<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints;

use MVQN\REST\Endpoints\EndpointObject;
use MVQN\REST\Annotations\EndpointAnnotation as Endpoint;
use MVQN\REST\Annotations\PostAnnotation as Post;
use MVQN\REST\Annotations\PostRequiredAnnotation as PostRequired;
use MVQN\REST\Annotations\PatchAnnotation as Patch;
use MVQN\REST\Annotations\PatchRequiredAnnotation as PatchRequired;
use MVQN\REST\Annotations\KeepNullElementsAnnotation as KeepNullElements;

use UCRM\REST\Endpoints\Collections\QuoteItemCollection;
use UCRM\REST\Endpoints\Collections\QuoteTaxCollection;
use UCRM\REST\Endpoints\Helpers\QuoteHelper;
use UCRM\REST\Endpoints\Lookups\QuoteItem;
use UCRM\REST\Endpoints\Lookups\QuoteTax;

/**
 * Class Quote
 *
 * @package UCRM\REST\Endpoints
 * @author Ryan Spaeth <rspaeth@mvqn.net>
 * @final
 *
 * @Endpoint { "get": "/quotes" }
 * @Endpoint { "getById": "/quotes/:id" }
 * @Endpoint { "post": "/clients/:clientId/quotes" }
 * @Endpoint { "patch": "/quotes/:id" }
 *
 * @method int|null getClientId()
 * @method Quote setClientId(int $id)
 * @method string|null getNumber()
 * @method Quote setNumber(string $number)
 * @method string|null getCreatedDate()
 * @see    Quote::setCreatedDate()
 * @method string|null getEmailSentDate()
 * @see    Quote::setEmailSentDate()
 * @method int|null getMaturityDays()
 * @method Quote setMaturityDays(int $day)
 * @method string|null getNotes()
 * @method Quote setNotes(string $notes)
 * @method string|null getAdminNotes()
 * @method Quote setAdminNotes(string $notes)
 * @method int|null getQuoteTemplateId()
 * @method Quote setQuoteTemplateId(int $id)
 * @method string|null getOrganizationName()
 * @method Quote setOrganizationName(string $name)
 * @method string|null getOrganizationRegistrationNumber()
 * @method Quote setOrganizationRegistrationNumber(string $number)
 * @method string|null getOrganizationTaxId()
 * @method Quote setOrganizationTaxId(string $id)
 * @method string|null getOrganizationStreet1()
 * @method Quote setOrganizationStreet1(string $street1)
 * @method string|null getOrganizationStreet2()
 * @method Quote setOrganizationStreet2(string $street2)
 * @method string|null getOrganizationCity()
 * @method Quote setOrganizationCity(string $city)
 * @method int|null getOrganizationCountryId()
 * @method Quote setOrganizationCountryId(int $id)
 * @method int|null getOrganizationStateId()
 * @method Quote setOrganizationStateId(int $id)
 * @method string|null getOrganizationZipCode()
 * @method Quote setOrganizationZipCode(string $zip)
 * @method string|null getOrganizationBankAccountName()
 * @method Quote setOrganizationBankAccountName(string $name)
 * @method string|null getOrganizationBankAccountField1()
 * @method Quote setOrganizationBankAccountField1(string $field1)
 * @method string|null getOrganizationBankAccountField2()
 * @method Quote setOrganizationBankAccountField2(string $field2)
 * @method string|null getClientFirstName()
 * @method Quote setClientFirstName(string $name)
 * @method string|null getClientLastName()
 * @method Quote setClientLastName(string $name)
 * @method string|null getClientCompanyName()
 * @method Quote setClientCompanyName(string $name)
 * @method string|null getClientCompanyRegistrationNumber()
 * @method Quote setClientCompanyRegistrationNumber(string $name)
 * @method string|null getClientCompanyTaxId()
 * @method Quote setClientCompanyTaxId(string $id)
 * @method string|null getClientStreet1()
 * @method Quote setClientStreet1(string $street1)
 * @method string|null getClientStreet2()
 * @method Quote setClientStreet2(string $street2)
 * @method string|null getClientCity()
 * @method Quote setClientCity(string $city)
 * @method int|null getClientCountryId()
 * @method Quote setClientCountryId(int $id)
 * @method int|null getClientStateId()
 * @method Quote setClientStateId(int $id)
 * @method string|null getClientZipCode()
 * @method Quote setClientZipCode(string $zip)
 * @method string|null getDueDate()
 * @see    Quote::setDueDate()
 * @see    Quote::getItems()
 * @see    Quote::setItems()
 * @method float|null getSubtotal()
 * @method float|null getDiscount()
 * @method string|null getDiscountLabel()
 * @see    Quote::getTaxes()
 * @method float|null getTotal()
 * @method float|null getAmountPaid()
 * @method string|null getCurrencyCode()
 * @method int|null getStatus()
 */
final class Quote extends EndpointObject
{
    use QuoteHelper;

    // =================================================================================================================
    // ENUMS
    // -----------------------------------------------------------------------------------------------------------------

    public const STATUS_OPEN      = 0;
    public const STATUS_ACCEPTED  = 1;
    public const STATUS_REJECTED  = 2;

    // =================================================================================================================
    // PROPERTIES
    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var int
     */
    protected $clientId;

    /**
     * @var string
     * @Post
     * @Patch
     */
    protected $number;

    /**
     * @var string
     * @Post
     * @Patch
     */
    protected $createdDate;

    /**
     * @param \DateTime $value
     * @return Quote
     */
    public function setCreatedDate(\DateTime $value): Quote
    {
        $this->createdDate = $value->format("c");
        return $this;
    }

    /**
     * @var string
     * @Post
     * @Patch
     */
    protected $notes;

    /**
     * @var string
     * @Post
     * @Patch
     */
    protected $adminNotes;

    /**
     * @var int
     * @Post
     * @Patch
     */
    protected $quoteTemplateId;

    /**
     * @var string
     * @Post
     * @Patch
     */
    protected $organizationName;

    /**
     * @var string
     * @Post
     * @Patch
     */
    protected $organizationRegistrationNumber;

    /**
     * @var string
     * @Post
     * @Patch
     */
    protected $organizationTaxId;

    /**
     * @var string
     * @Post
     * @Patch
     */
    protected $organizationStreet1;

    /**
     * @var string
     * @Post
     * @Patch
     */
    protected $organizationStreet2;

    /**
     * @var string
     * @Post
     * @Patch
     */
    protected $organizationCity;

    /**
     * @var int
     * @Post
     * @Patch
     */
    protected $organizationCountryId;

    /**
     * @var int
     * @Post
     * @Patch
     */
    protected $organizationStateId;

    /**
     * @var string
     * @Post
     * @Patch
     */
    protected $organizationZipCode;

    /**
     * @var string
     * @Post
     * @Patch
     */
    protected $organizationBankAccountName;

    /**
     * @var string
     * @Post
     * @Patch
     */
    protected $organizationBankAccountField1;

    /**
     * @var string
     * @Post
     * @Patch
     */
    protected $organizationBankAccountField2;

    /**
     * @var string
     * @Post
     * @Patch
     */
    protected $clientFirstName;

    /**
     * @var string
     * @Post
     * @Patch
     */
    protected $clientLastName;

    /**
     * @var string
     * @Post
     * @Patch
     */
    protected $clientCompanyName;

    /**
     * @var string
     * @Post
     * @Patch
     */
    protected $clientCompanyRegistrationNumber;

    /**
     * @var string
     * @Post
     * @Patch
     */
    protected $clientCompanyTaxId;

    /**
     * @var string
     * @Post
     * @Patch
     */
    protected $clientStreet1;

    /**
     * @var string
     * @Post
     * @Patch
     */
    protected $clientStreet2;

    /**
     * @var string
     * @Post
     * @Patch
     */
    protected $clientCity;

    /**
     * @var int
     * @Post
     * @Patch
     */
    protected $clientCountryId;

    /**
     * @var int
     * @Post
     * @Patch
     */
    protected $clientStateId;

    /**
     * @var string
     * @Post
     * @Patch
     */
    protected $clientZipCode;

    /**
     * @var QuoteItem[]
     * @PostRequired
     * @PatchRequired
     *
     * @KeepNullElements
     */
    protected $items;

    /**
     * @return QuoteItemCollection
     * @throws \Exception
     */
    public function getItems(): QuoteItemCollection
    {
        return new QuoteItemCollection($this->items);
    }

    /**
     * @param QuoteItemCollection $value
     * @return Quote
     */
    public function setItems(QuoteItemCollection $value): Quote
    {
        $this->items = $value->elements();
        return $this;
    }

    /**
     * @var float
     */
    protected $subtotal;

    /**
     * @var float
     */
    protected $discount;

    /**
     * @var string
     */
    protected $discountLabel;

    /**
     * @var QuoteTax[]
     * @patch
     */
    protected $taxes;

    /**
     * @return QuoteTaxCollection
     * @throws \Exception
     */
    public function getTaxes(): QuoteTaxCollection
    {
        return new QuoteTaxCollection($this->taxes);
    }

    /**
     * @var float
     */
    protected $total;

    /**
     * @var string
     */
    protected $currencyCode;

    /**
     * @var int
     */
    protected $status;

}
