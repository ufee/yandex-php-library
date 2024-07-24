<?php
namespace Yandex\Metrica\Management\Models;
use Yandex\Common\ObjectModel;

class Conditions extends ObjectModel
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
    public function add($condition): self
    {
        if (is_array($condition)) {
            $this->collection[] = new Condition($condition);
        } elseif (is_object($condition) && $condition instanceof Condition) {
            $this->collection[] = $condition;
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
