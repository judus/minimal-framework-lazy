<?php

namespace Maduser\Minimal\Database\ORM;

use Maduser\Minimal\Collections\CollectionInterface;
use Maduser\Minimal\Database\Exceptions\DatabaseException;

class BelongsTo extends AbstractRelation
{
    public function __construct($class, $foreignKey, $localKey)
    {
        $this->setClass($class);
        $this->setLocalKey($localKey);
        $this->setForeignKey($foreignKey);
        $this->setCaller(debug_backtrace()[1]['object']);
    }

    public function resolve(
        CollectionInterface $collection,
        $with,
        ORM $queryingClass = null
    ) {

        $collection = $collection->filter(function($value) {
            return ! is_null($value);
        });

        $foreignKeys = $collection->extract($this->getForeignKey());

        if (count($foreignKeys) == 0) return;

        $relatedCollection = $this->getWhereIn($foreignKeys);

        if (! $relatedCollection) return;

        /** @var ORM $item */
        foreach ($collection->getArray() as &$item) {
            foreach ($relatedCollection as $related) {
                if ($item->{$this->getForeignKey()} ==
                    $related->{$this->getLocalKey()}
                ) {
                    $item->addRelated($with, $related);
                }
            }
        }

    }

    public function resolveInline(ORM $queryingClass)
    {
        $class = $this->getClass();

        /** @noinspection PhpUndefinedMethodInspection */
        return $class::instance()->where([
                $this->getLocalKey(),
                $queryingClass->{$this->getForeignKey()}
        ])->getFirst();
    }

    public function getWhereIn($array)
    {
        $class = $this->getClass();

        /** @noinspection PhpUndefinedMethodInspection */
        return $class::instance()->where([
            $this->localKey,
            'IN',
            implode(',', $array)
        ])->getAll();
    }

    public function __call($name, $args)
    {
        array_unshift($args, $this);

        if (!in_array($name, ['associate', 'dissociate'])) {
            throw new DatabaseException('Call to undefined method ' . __CLASS__ . '::' . $name . '()');
        }

        return call_user_func_array([$this->getCaller(), $name], $args);
    }

}