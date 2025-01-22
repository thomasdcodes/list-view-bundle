# thomasd.codes List View Bundle for Symfony

## Description

This Bundle provides an easy to use set of different rich models packed into one wrapper ```ListControl``` to hold all information for a list view.

Its reason of life is only to hold the information and get richer at runtime of the app. For example, after init ```ListControl``` the ```Paginator``` in it doesn't know how many search results are found. You have the set the number of search results after querying your repo with the help of ```SearchTermOrganizer``` or ```FilterOrganizer```, because the information of these models influence the number of search results.

## Install
```shell
composer require thomasdcodes/list-view-bundle
```
If you're using Symfony Flex, the Bundle should be registered in your config/bundles.php

## How to use
With the bundle comes a factory to create the ```ListControl``` Model. There is only one static method of creating this model, for example in a controller:

```php
use Tdc\ListViewBundle\Factory;

public function __invoke(Request $request): JsonResponse
{
    $listControl = ListControlFactory::createFromRequest(Request $request);
}
```

### Paginator
Inside the ```ListControl``` Model, you can fetch the ```Paginator```. The ```Paginator``` will be setup behind the scenes with data coming from ```Request``` object. It uses the ```page``` and the ```limit``` query parameter to get to life.

Now you need to bring the whole ```ListControl``` object through your querying process and set the number of total results onto the ```Paginator```:

```php
// A Method inside your controller
public function __invoke(): Response
{
    $listControl = ListControlFactory::createFromRequest(Request $request);
    
    // Make a query with your $listControl
    $result = $this->personRepository->loadWithListControl($listControl);
    
    $listControl->getPaginator()->setTotal($result->numberOfResults());
    
    //………
}

```