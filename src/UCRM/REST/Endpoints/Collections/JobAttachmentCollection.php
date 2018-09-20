<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints\Collections;

use MVQN\Collections\Collectible;
use MVQN\Collections\Collection;

use UCRM\REST\Endpoints\JobAttachment;

/**
 * Class JobAttachmentCollection
 *
 * @package UCRM\REST\Endpoints\Collections
 * @author Ryan Spaeth <rspaeth@mvqn.net>
 */
final class JobAttachmentCollection extends Collection
{
    /**
     * @param Collectible[]|null $elements
     * @throws \Exception
     */
    public function __construct(?array $elements = [])
    {
        parent::__construct(JobAttachment::class, $elements);
    }
}