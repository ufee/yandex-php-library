<?php
namespace Yandex\Metrica\Management\Models;
use Yandex\Common\ObjectModel;

class Counters extends ObjectModel
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
    public function add($counterItem): self
    {
        if (is_array($counterItem)) {
            $this->collection[] = new CounterItem($counterItem);
        } elseif (is_object($counterItem) && $counterItem instanceof CounterItem) {
            $this->collection[] = $counterItem;
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
