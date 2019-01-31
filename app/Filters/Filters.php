<?php namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class Filters
{
    /**
     * @var array
     */
    protected $filters = [];

    /**
     * @var \Illuminate\Database\Query\Builder
     */
    protected $builder;

    /**
     * @var array
     */
    private $parsedFilters = [];

    /**
     * @var array
     */
    protected $acceptedSortColumns = [];
    /**
     * @var array
     */
    protected $filtersMap;
    /**
     * @var String
     */
    protected $filtersFor;


    /**
     * @param \Illuminate\Http\Request $request
     */
    public function __construct(Request $request = null)
    {
        if (is_null($request)) {
            return;
        }
        $this->parsedFilters = array_filter($request->only($this->getFilters()));
        $this->acceptedSortColumns = array_flip($this->acceptedSortColumns);
    }

    /**
     * @param \Illuminate\Database\Eloquent\Builder $builder
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function apply($builder): Builder
    {
        $this->builder = $builder;
        foreach ($this->parsedFilters as $filter => $value) {
            if (method_exists($this, $this->filtersMap[$filter])) {
                $this->{$this->filtersMap[$filter]}($value);
            }
        }
        return $builder;
    }

    /**
     * @param string $value
     * @return string|null
     */
    public function getFilter($value)
    {
        return $this->parsedFilters[$this->translateFilter($value)] ?? null;
    }

    /**
     * @param string $value
     * @return string
     */
    private function translateFilter($value)
    {
        return trans(sprintf('ajax.filters_inv.%s', $value));
    }

    /**
     * @return array
     */
    private function getFilters()
    {
        $onlyFilters = [];
        foreach ($this->filters as $filter) {
            $key = $this->translateFilter($filter);
            $this->filtersMap[$key] = $filter;
            $onlyFilters[] = $key;
        }
        return $onlyFilters;
    }

    /**
     * @param string $value
     * @return bool
     */
    public function hasFilter($value)
    {
        return isset($this->parsedFilters[$this->translateFilter($value)]);
    }

    public function hasFilters(){
        return (!empty($this->parsedFilters));
    }

    /**
     * @return String
     */
    public function getFiltersFor()
    {
        return $this->filtersFor;
    }
}