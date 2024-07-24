<?php
namespace Yandex\Metrica\Management\Models;
use Yandex\Common\ObjectModel;

class Grants extends ObjectModel
{
    protected array $collection = [];
    protected $mappingClasses = [];
    protected $propNameMap = [];

    public function __construct(array $collection = [])
    {
        foreach($collection as $val) {
			$this->add($val);
		}
    }
	
    /**
     * Add item
     */
    public function add($grant): self
    {
        if (is_array($grant)) {
            $this->collection[] = new Grant($grant);
        } elseif (is_object($grant) && $grant instanceof Grant) {
            $this->collection[] = $grant;
        }
        return $this;
    }

    /**
     * Get items
     */
    public function getAll(): array
    {
        return $this->collection;
    }
}
