<?php
namespace Yandex\Metrica\Management\Models;
use Yandex\Common\ObjectModel;

class Accounts extends ObjectModel
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
    public function add($account): self
    {
        if (is_array($account)) {
            $this->collection[] = new Account($account);
        } elseif (is_object($account) && $account instanceof Account) {
            $this->collection[] = $account;
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
