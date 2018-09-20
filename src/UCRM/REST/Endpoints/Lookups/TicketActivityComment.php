<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints\Lookups;

use UCRM\REST\Endpoints\Collections\TicketAttachmentCollection;

/**
 * Class TicketActivityComment
 *
 * @package UCRM\REST\Endpoints
 * @author Ryan Spaeth <rspaeth@mvqn.net>
 * @final
 *
 * @method string|null getBody()
 * @method TicketActivityComment setBody(string $body)
 * @see    TicketActivityComment::getAttachments()
 * @see    TicketActivityComment::setAttachments()
 */
final class TicketActivityComment extends Lookup
{

    // =================================================================================================================
    // PROPERTIES
    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var string
     */
    protected $body;

    /**
     * @var TicketAttachment[]
     */
    protected $attachments;

    /**
     * @return TicketAttachmentCollection
     * @throws \Exception
     */
    public function getAttachments(): TicketAttachmentCollection
    {
        return new TicketAttachmentCollection($this->attachments);
    }

    /**
     * @param TicketAttachmentCollection $value
     * @return TicketActivityComment
     */
    public function setAttachments(TicketAttachmentCollection $value): TicketActivityComment
    {
        $this->attachments = $value->elements();
        return $this;
    }

}
