<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints\Helpers\Common;

use MVQN\Collections\Exceptions\CollectionException;
use MVQN\Annotations\Exceptions\AnnotationReaderException;

use UCRM\REST\Endpoints\Collections\ClientContactCollection;
use UCRM\REST\Endpoints\Lookups\ClientContact;
use UCRM\REST\Exceptions\RestObjectException;

trait ContactHelpers
{
    // =================================================================================================================
    // HELPER METHODS
    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @param int $id
     * @return ClientContact|null
     * @throws CollectionException
     */
    public function getContactById(int $id): ?ClientContact
    {
        /** @var ClientContact $contact */
        $contact = (new ClientContactCollection($this->{"contacts"}))->where("id", $id)->first();
        return $contact;
    }

    /**
     * @param ClientContact $contact
     * @return ContactHelpers
     * @throws AnnotationReaderException
     * @throws RestObjectException
     * @throws \ReflectionException
     */
    public function addContact(ClientContact $contact): self
    {
        $this->{"contacts"}[] = $contact->toArray();

        /** @var self $this */
        return $this;
    }

    // TODO: Add delContact() abilities as they become available.

}