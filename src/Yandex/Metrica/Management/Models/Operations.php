<?php
namespace Yandex\Metrica\Management\Models;
use Yandex\Common\ObjectModel;

class Operations extends ObjectModel
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
    public function add($operation): self
    {
        if (is_array($operation)) {
            $this->collection[] = new Operation($operation);
        } elseif (is_object($operation) && $operation instanceof Operation) {
            $this->collection[] = $operation;
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
