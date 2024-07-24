<?php
/**
 * Yandex PHP Library
 *
 * @copyright NIX Solutions Ltd.
 * @link https://github.com/nixsolutions/yandex-php-library
 */
namespace Yandex\Common;
use Iterator;
use Countable;

/**
 * Class ObjectModel
 * @package Yandex\Common
 */
class ObjectModel extends Model implements Iterator, Countable
{
    protected array $collection = [];
    protected int $innerCounter = -1;

    public function __construct(array $collection = [])
    {
        $this->collection = $collection;
    }

    public function current(): mixed
    {
        $current = current($this->collection);
        if (is_array($current)) {
            return new ObjectModel($current);
        }
        return $current;
    }

    public function next(): void
    {
        $this->innerCounter++;
        next($this->collection);
    }

    public function key(): mixed
    {
        return key($this->collection);
    }

    public function valid(): bool
    {
        $key = key($this->collection);
        return $key !== null && $key !== false;
    }

    public function rewind(): void
    {
        $this->innerCounter = 0;
        reset($this->collection);
    }

    public function count(): int
    {
        return count($this->collection);
    }
}
