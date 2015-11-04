<?php

namespace You\BookingBundle\Entity;

/**
 * Class Uploader
 * @package You\BookingBundle\Entity
 */
class Uploader
{
    /**
     * @param Image $image
     */
    public function uploadBase64File(Image $image) {

        $base64String = $image->getBase64Content();
        $imageName = $image->getName();

        list($type, $data) = explode(';', $base64String);
        list(, $extension) = explode('/', $type);
        list(, $data) = explode(',', $data);

        $data = base64_decode($data);

        $imageNameUrl = $imageName;//.uniqid() . "." . $extension;

        $path = __DIR__ . '/../../../../uploads/'.$imageNameUrl;

        if (file_exists($path)) {
            $imageNameUrl = uniqid() . "." . $extension;
            $path = __DIR__ . '/../../../../uploads/'.$imageNameUrl;
        }

        /**returns the number of bytes that were written to the file, or false on failure */
        file_put_contents($path, $data);
    }
}