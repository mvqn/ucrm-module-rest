<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints\Helpers\Common;

use UCRM\REST\Endpoints\Endpoint;
use UCRM\REST\Endpoints\{Collections\ClientContactCollection, Country, Lookups\ClientContact, State};

trait ContactHelpers
{
    // =================================================================================================================
    // HELPER METHODS
    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @param int $id
     * @return ClientContact
     * @throws \MVQN\Collections\CollectionException
     */
    public function getContactById(int $id): ?ClientContact
    {
        /** @var ClientContact $contact */
        $contact = (new ClientContactCollection($this->{"contacts"}))->where("id", $id)->first();
        return $contact;
    }

    public function addContact(ClientContact $contact): self
    {
        $this->{"contacts"}[] = $contact->toArray();

        /** @var self $this */
        return $this;
    }

    // TODO: Add delContact() abilities as they become available.

}