<?php

namespace You\BookingBundle\Manager;

use You\BookingBundle\Entity\Category;
use You\BookingBundle\Repository\CategoryRepository;

class CategoryManager
{

    /**
     * @var CategoryRepository
     */
    protected $repository;

    /**
     * @param CategoryRepository $repository
     */
    public function __construct(CategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param $id
     * @return Category
     */
    public function findCategory($id) {
        return $this->repository->findOneById($id);
    }

    /**
     * @param Category $category
     */
    public function saveCategory(Category $category)
    {
        //@TODO $this->categoryContainer->prepareSaveCategory($category);
        $this->repository->saveCategory($category);
    }

    /**
     * @param $category_id
     * @return null|object
     */
    public function getCategory($category_id) {
        return $this->repository->find($category_id);
    }

    /**
     * @param Category $category
     * @return Category
     */
    public function removeCategory(Category $category) {
        return $this->repository->removeCategory($category);
    }

    /**
     * @return array
     */
    public function findAllCategories() {
        return $this->repository->findAll();
    }

    /**
     * @param $array
     * @return array
     */
    public function getCategoriesFromCollection($array) {
        return $this->repository->getCategoriesFromCollection($array);
    }


}