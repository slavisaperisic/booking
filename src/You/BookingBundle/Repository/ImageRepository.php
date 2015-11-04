<?php

namespace You\BookingBundle\Repository;

use Doctrine\ORM\EntityRepository;
use You\BookingBundle\Entity\Image;

/**
 * Class ImageRepository
 *
 * @package You/BookingBundle/Entity/Repository
 */
class ImageRepository extends EntityRepository
{

    /**
     * @return string
     */
    protected function getAlias()
    {
        return 'image';
    }

    /**
     * @param Image $image
     * @return Image
     */
    public function saveImage(Image $image) {

        $em = $this->getEntityManager();
        $em->persist($image);
        $em->flush();

        return $image;
    }

    /**
     * @param Image $image
     * @return Image
     */
    public function removeImage(Image $image) {

        $em = $this->getEntityManager();
        $em->remove($image);
        $em->flush();

        return $image;
    }

}