<?php

namespace You\BookingBundle\Repository;

use Doctrine\ORM\EntityRepository;
use You\BookingBundle\Entity\Category;

/**
 * Class CategoryRepository
 *
 * @package You/BookingBundle/Entity/Repository
 */
class CategoryRepository extends EntityRepository
{

    /**
     * @return string
     */
    protected function getAlias()
    {
        return 'category';
    }

    /**
     * @param Category $category
     * @return Category
     */
    public function saveCategory(Category $category) {

        $em = $this->getEntityManager();
        $em->persist($category);
        $em->flush();

        return $category;
    }

    /**
     * @param Category $category
     * @return Category
     */
    public function removeCategory(Category $category) {

        $em = $this->getEntityManager();
        $em->remove($category);
        $em->flush();

        return $category;
    }

    /**
     * @param mixed $array
     *
     * @return array
     */
    public function getCategoriesFromCollection($array)
    {
        $qb = $this->createQueryBuilder($this->getAlias());

        foreach ($array as $key => $value) {
            !$key ? call_user_func(
                function () use (&$qb, $key, $value) {
                    $qb->where(($this->getAlias().'.id = ?'.$key))->setParameter($key, $value->getId());
                }
            ) : call_user_func(
                function () use (&$qb, $key, $value) {
                    $qb->orWhere($this->getAlias().'.id = ?'.$key)->setParameter($key, $value->getId());
                }
            );
        }

        return $qb->getQuery()->getResult();

    }

}