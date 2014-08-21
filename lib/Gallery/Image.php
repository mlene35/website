<?php

class Gallery_Image extends BaseObject
{

    protected $gallery = null;

    public function __construct(array $data = array())
    {
        if ($data) {
            $this->addData($data);
        }
    }

    public function load($id)
    {

    }

    public function loadGallery()
    {
        if (is_null($this->gallery)) {
            if (!$this->getData('gallery_id')) {
                return false;
            }
            $this->gallery = new Gallery();
            $this->gallery->load(
                $this->getData('gallery_id')
            );
        }

        return $this->gallery;
    }

    public function setGallery(Gallery $gallery)
    {
        $this->gallery = $gallery;
    }
}