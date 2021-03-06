<?php
declare(strict_types=1);

namespace Klamparski\T3apicontent\Domain\Model;

use SourceBroker\T3api\Annotation as T3api;
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

/**
 * @T3api\ApiResource(
 *     itemOperations={
 *          "get"={
 *              "method"="GET",
 *              "path"="/content/pages/{id}",
 *          },
 *     },
 *     collectionOperations={
 *          "get"={
 *              "method"="GET",
 *              "path"="/content/pages",
 *          },
 *     },
 * )
 */
class Page extends AbstractEntity
{
    /**
     * @var string
     */
    protected $title;

    /**
     * @var string
     */
    protected $slug;

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Klamparski\T3apicontent\Domain\Model\Page>
     * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
     * @T3api\Serializer\MaxDepth(3)
     */
    protected $pages;

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Klamparski\T3apicontent\Domain\Model\AbstractContentElement>
     * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
     */
    protected $contentElements;

    public function __construct()
    {
        $this->pages = new ObjectStorage();
        $this->contentElements = new ObjectStorage();
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getSlug(): string
    {
        return $this->slug;
    }

    public function getPages(): ObjectStorage
    {
        return $this->pages;
    }

    public function getContentElements(): ObjectStorage
    {
        return $this->contentElements;
    }
}
