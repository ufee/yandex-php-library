<?php
namespace Yandex\Metrica\Management\Models;
use Yandex\Common\ObjectModel;

class Delegates extends ObjectModel
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
    public function add($delegate): self
    {
        if (is_array($delegate)) {
            $this->collection[] = new Delegate($delegate);
        } elseif (is_object($delegate) && $delegate instanceof Delegate) {
            $this->collection[] = $delegate;
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
