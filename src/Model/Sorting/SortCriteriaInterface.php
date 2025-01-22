<?php

namespace Tdc\ListViewBundle\Model\Sorting;

interface SortCriteriaInterface
{
    public function getPropertyName(): string;
}