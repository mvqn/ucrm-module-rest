<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints\Lookups;

use UCRM\REST\Endpoints\Collections\ClientContactTypeCollection;

/**
 * Class ClientContact
 *
 * @package UCRM\REST\Endpoints
 * @author Ryan Spaeth <rspaeth@mvqn.net>
 * @final
 *
 * @method int|null getClientId()
 *
 * @method string|null getEmail()
 * @method ClientContact setEmail(string $email)
 *
 * @method string|null getPhone()
 * @method ClientContact setPhone(string $phone)
 *
 * @method string|null getName()
 * @method ClientContact setName(string $name)
 *
 * @method bool|null getIsBilling()
 * @method ClientContact setIsBilling(bool $billing)
 *
 * @method bool|null getIsContact()
 * @method ClientContact setIsContact(bool $contact)
 *
 * @see ClientContact::getTypes()
 *
 */
final class ClientContact extends Lookup
{

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
    protected $email;

    /**
     * @var string
     * @post
     * @patch
     */
    protected $phone;

    /**
     * @var string
     * @post
     * @patch
     */
    protected $name;

    /**
     * @var bool
     * @post
     * @patch
     */
    protected $isBilling;

    /**
     * @var bool
     * @post
     * @patch
     */
    protected $isContact;

    /**
     * @var ClientContactType[]
     * @post
     * @patch
     */
    protected $types;

    /**
     * @return ClientContactTypeCollection
     * @throws \Exception
     */
    public function getTypes(): ClientContactTypeCollection
    {
        /** @var ClientContactTypeCollection $types */
        $types = new ClientContactTypeCollection($this->types);
        return $types;
    }

}
