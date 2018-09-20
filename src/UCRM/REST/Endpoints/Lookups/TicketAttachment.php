<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints\Lookups;

/**
 * Class TicketAttachment
 *
 * @package UCRM\REST\Endpoints
 * @author Ryan Spaeth <rspaeth@mvqn.net>
 * @final
 *
 * @method int|null getId()
 * @method TicketAttachment setId(int $id)
 * @method string|null getFilename()
 * @method TicketAttachment setFilename(string $filename)
 * @method int|null getSize()
 * @method TicketAttachment setSize(int $size)
 * @method string|null getMimeType()
 * @method TicketAttachment setMimeType(string $type)
 *
 */
final class TicketAttachment extends Lookup
{

    // =================================================================================================================
    // PROPERTIES
    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $filename;

    /**
     * @var int
     */
    protected $size;

    /**
     * @var string
     */
    protected $mimeType;

}
