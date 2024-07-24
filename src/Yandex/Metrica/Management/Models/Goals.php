<?php
namespace Yandex\Metrica\Management\Models;
use Yandex\Common\ObjectModel;

class Goals extends ObjectModel
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
    public function add($goal): self
    {
        if (is_array($goal)) {
            $this->collection[] = new Goal($goal);
        } elseif (is_object($goal) && $goal instanceof Goal) {
            $this->collection[] = $goal;
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
