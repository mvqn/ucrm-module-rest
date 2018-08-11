<?php
declare(strict_types=1);

namespace MVQN\Collections;



/**
 * Class Collection
 *
 * @package MVQN\Collections
 * @author Ryan Spaeth <rspaeth@mvqn.net>
 */
class Collection implements \JsonSerializable
{
    /**
     * @var Collectible[] $elements
     */
    protected $elements;

    /**
     * @var string
     */
    protected $type;

    // -----------------------------------------------------------------------------------------------------------------

    #region MAGIC METHODS

    /**
     * Collection constructor.
     *
     * @param string $type
     * @param Collectible[] $elements
     * @throws CollectionException
     */
    public function __construct(string $type, array $elements = [])
    {
        if(!is_subclass_of($type, Collectible::class, true))
            throw new CollectionException("The specified type: '$type' must extend '".Collectible::class."'!");

        $this->type = $type;
        $this->addMany($elements);
    }

    /**
     * Overrides the default string representation of the class.
     *
     * @return string Returns a JSON representation of this Model.
     */
    public function __toString()
    {
        // Return the array as a JSON string.
        return json_encode($this, JSON_UNESCAPED_SLASHES);
    }

    #endregion

    // -----------------------------------------------------------------------------------------------------------------

    #region JSON IMPLEMEMENTATION

    /**
     * Specify data which should be serialized to JSON.
     *
     * @link http://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed Data to be serialized by <b>json_encode</b>, which can be of any type except a resource.
     */
    public function jsonSerialize()
    {
        // Returns an array of all Model properties.
        return get_object_vars($this);
    }

    #endregion

    // -----------------------------------------------------------------------------------------------------------------

    #region GET METHODS

    /**
     * @return Collectible[]
     */
    public function elements(): array
    {
        return $this->elements;
    }

    /**
     * @param int $index
     * @return Collectible|null
     * @throws CollectionException
     */
    public function at(int $index): ?Collectible
    {
        if(!$this->hasIndex($index))
            throw new CollectionException("The index: '$index' was not found in the Collection!");

        return $this->elements[$index];
    }

    /**
     * @return Collectible|null
     * @throws CollectionException
     */
    public function first(): ?Collectible
    {
        $index = 0;

        if(!$this->hasIndex($index))
            throw new CollectionException("The index: '$index' is invalid!");

        return $this->elements[$index];
    }

    /**
     * @return Collectible|null
     * @throws CollectionException
     */
    public function last(): ?Collectible
    {
        $index = $this->count() - 1;

        if(!$this->hasIndex($index))
            throw new CollectionException("The index: '$index' is invalid!");

        return $this->elements[$index];
    }



    /**
     * @return Collection
     * @throws CollectionException
     */
    public function all(): Collection
    {
        return new Collection($this->type, $this->elements);
    }

    /**
     * @param array $range
     * @return Collection
     * @throws CollectionException
     */
    public function every(array $range): Collection
    {
        if(!$range)
            throw new CollectionException("The range: '".json_encode($range, JSON_UNESCAPED_SLASHES)."' is invalid!");

        $collection = [];

        foreach($range as $index)
        {
            if(!$this->hasIndex($index))
                throw new CollectionException("The index: '$index' was not found in the Collection!");

            $collection[] = $this->elements[$index];
        }

        return new Collection($this->type, $collection);
    }

    /**
     * @param int $index
     * @param int $count
     * @return Collection
     * @throws CollectionException
     */
    public function section(int $index, int $count): Collection
    {
        $range = range($index, $index + $count);
        return $this->every($range);
    }



    public function push(?Collectible $element): Collection
    {

    }

    public function pop(): ?Collectible
    {

    }

    public function popMany(int $count): Collection
    {

    }



    public function shift(?Collectible $element): Collection
    {

    }

    public function unshift(): ?Collectible
    {

    }

    public function unshiftMany(int $count): Collection
    {

    }

    #endregion

    // -----------------------------------------------------------------------------------------------------------------

    #region ADD METHODS

    /**
     * @param Collectible|null $element
     * @return Collection
     * @throws CollectionException
     */
    public function add(?Collectible $element): Collection
    {
        $this->addMany([ $element ]);
        return $this;
    }

    /**
     * @param Collectible[] $elements
     * @return Collection
     * @throws CollectionException
     */
    public function addMany(array $elements): Collection
    {
        foreach($elements as $element)
        {
            if(!is_subclass_of($element, $this->type, true))
                throw new CollectionException("The element type: '".get_class($element)."' must match or extend '".
                    get_class($this->type)."'!");

            $this->elements[] = $element;
        }

        return $this;
    }

    #endregion

    // -----------------------------------------------------------------------------------------------------------------

    #region INSERT METHODS

    /**
     * @param int $index
     * @param Collectible|null $element
     * @return Collection
     * @throws CollectionException
     */
    public function insert(int $index, ?Collectible $element): Collection
    {
        return $this->insertMany($index, [ $element ]);
    }

    /**
     * @param int $index
     * @param Collectible[] $elements
     * @return Collection
     * @throws CollectionException
     */
    public function insertMany(int $index, array $elements): Collection
    {
        foreach($elements as $element)
        {
            if(!is_subclass_of($element, $this->type, true))
                throw new CollectionException("The element type: '".get_class($element)."' must match or extend '".
                    get_class($this->type)."'!");
        }

        array_splice($this->elements, $index, 0, $elements);

        return $this;
    }

    #endregion

    // -----------------------------------------------------------------------------------------------------------------

    #region DELETE METHODS

    /**
     * @param Collectible|null $element
     * @param int|null $index
     * @return Collection
     * @throws CollectionException
     */
    public function delete(?Collectible $element, ?int &$index = null): Collection
    {
        $collection = $this->deleteMany([$element], $indices);
        $index = $indices !== null ? $indices[0] : null;

        return $collection;
    }

    /**
     * @param Collectible[] $elements
     * @param array|null $indices
     * @return Collection
     * @throws CollectionException
     */
    public function deleteMany(array $elements, ?array &$indices = null): Collection
    {
        foreach($this->elements as $index => $element)
        {
            if(!is_subclass_of($element, $this->type, true))
                throw new CollectionException("The element type: '".get_class($element)."' must match or extend '".
                    get_class($this->type)."'!");

            // IF the element exists in the Collection...
            if(!empty(array_intersect($this->elements, $elements)))
            {
                // THEN add its index to the list of deleted indices.
                $indices[] = $index;

                // And then unset the value.
                unset($this->elements[$index]);
            }
        }

        // Reindex the array!
        $this->elements = array_values($this->elements);

        return $this;
    }

    #endregion

    // -----------------------------------------------------------------------------------------------------------------

    #region EXEC METHODS

    /**
     * @param callable $executer
     * @param array|null $results
     * @return Collection
     */
    public function each(callable $executer, array &$results = null): Collection
    {
        return $this->execFunc($executer, $results);
    }

    /**
     * @param callable $executer
     * @param array|null $results
     * @return Collection
     */
    public function execFunc(callable $executer, array &$results = null): Collection
    {
        // Loop through each element of the collection...
        foreach($this->elements as $element)
        {
            // Run the executer callback on the current element and append the result to the results array.
            $result[] = $executer($element);
        }

        // Return this Collection for chaining methods!
        return $this;
    }

    #endregion

    // -----------------------------------------------------------------------------------------------------------------

    #region FIND METHODS

    /**
     * @param callable $evaluator
     * @return Collection
     * @throws CollectionException
     */
    public function findFunc(callable $evaluator): Collection
    {
        // Initialize a collection of matches.
        $matches = [];

        // Loop through each element of the collection...
        foreach($this->elements as $element)
        {
            // Run the evaluator callback on the current element...
            if($evaluator($element))
                // AND add the result to the collection of matches if the evaluator returns true.
                $matches[] = $element;
        }

        // Return the collection of matches, even if it is empty!
        return new Collection($this->type, $matches);
    }

    /**
     * @param string $property
     * @param $value
     * @return Collection
     * @throws CollectionException
     */
    public function findWhere(string $property, $value): Collection
    {
        return $this->findWhereAll([ $property => $value ]);
    }

    /**
     * @param Collectible[] $comparisons
     * @return Collection
     * @throws CollectionException
     */
    public function findWhereAll(array $comparisons): Collection
    {
        foreach($comparisons as $property => $value)
        {
            if(!property_exists($this->type, $property))
                throw new CollectionException("The comparison could not be run, as the property '$property' does not ".
                "exist on the Collectible '{$this->type}'");
        }

        return $this->findFunc(
            function ($current) use ($comparisons)
            {
                foreach ($comparisons as $property => $value)
                {
                    if ($current->$property !== $value)
                        return false;
                }

                return true;
            }
        );
    }

    /**
     * @param Collectible[] $comparisons
     * @return Collection
     * @throws CollectionException
     */
    public function findWhereAny(array $comparisons): Collection
    {
        foreach($comparisons as $property => $value)
        {
            if(!property_exists($this->type, $property))
                throw new CollectionException("The comparison could not be run, as the property '$property' does not ".
                    "exist on the Collectible '{$this->type}'");
        }

        return $this->findFunc(
            function ($current) use ($comparisons)
            {
                foreach ($comparisons as $property => $value)
                {
                    if ($current->$property === $value)
                        return true;
                }

                return false;
            }
        );
    }

    #endregion

    // -----------------------------------------------------------------------------------------------------------------

    #region UTILITY METHODS

    /**
     * @param int $index
     * @return bool
     */
    public function hasIndex(int $index): bool
    {
        return ($index < count($this->elements));
    }

    /**
     * @param Collectible $collectible
     * @return bool
     */
    public function hasElement(Collectible $collectible): bool
    {
        foreach($this->elements as $element)
        {
            if($element === $collectible)
                return true;
        }

        return false;
    }

    /**
     * @return int
     */
    public function count(): int
    {
        return count($this->elements);
    }

    /**
     * @return Collection
     */
    public function clear(): Collection
    {
        $this->elements = [];
        return $this;
    }

    #endregion




}