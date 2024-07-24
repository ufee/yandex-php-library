<?php
namespace Yandex\Metrica\Management\Models;
use Yandex\Common\ObjectModel;

class Filters extends ObjectModel
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
    public function add($filter): self
    {
        if (is_array($filter)) {
            $this->collection[] = new Filter($filter);
        } elseif (is_object($filter) && $filter instanceof Filter) {
            $this->collection[] = $filter;
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
