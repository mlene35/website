<?php
require_once 'Database.php';

class Gallery extends BaseObject
{

    protected $images = array();
    protected $themeUrl = 'js/themes/classic/galleria.%s.min.js';


    public function load($id, $loadImages = true){
        $database = Database::getInstance();

        //Array mit daten erstellen von datenbankliste
        $galleryData = $database->query(
                "SELECT * FROM gallery WHERE id = :id LIMIT 1",
                array('id' => $id)
            )
            ->fetchRow();

        //check if we have an result
        if (!$galleryData) {
            throw new Exception(sprintf('Unable to load gallery by id: %s', $id));
        }
        $this->addData($galleryData); //Das Array wird der funktion Add data übergeben.

        if($loadImages){
            $this->loadImages();
        }
        return $this;
    }

    public function loadByIdentifier($identifier, $loadImages = true)
    {
        $database = Database::getInstance();

        $galleryData = $database->query(
                sprintf("SELECT * FROM gallery WHERE identifier = '%s' LIMIT 1", $identifier)
            )->fetchRow();

        //check if we have an result
        if (!$galleryData) {
            throw new Exception(sprintf('Unable to load gallery by identifer: %s', $identifier));
        }
        $this->addData($galleryData);

        if($loadImages){
            $this->loadImages();
        }
        return $this;
    }


    public function loadImages()
    {
        if(!$this->getId()){
            throw new Exception('unable to load images, gallery not loaded'); //wenn es keine id gibt
        }

        $database = Database::getInstance();
        $images = $database->query(
            sprintf("
                SELECT
                    *
                FROM
                    gallery_image
                WHERE
                    gallery_id = '%s'
                ", $this->getId())
        )->fetchArray();

        $this->addImages($images);
        return $this;
    }

    public function save(){

        $this->saveImages();
    }

    protected function saveImages(){

    }

    public function uploadImages(){
        //todo upload

        $this->saveImages();
    }

    public function getId(){
        return $this->getData('id');
    }


    public function getThemeUrl()
    {
        return sprintf(
            $this->themeUrl,
            $this->getData('theme', 'classic')
        );
    }

    /**
     * @param array $images
     * @return $this
     */
    public function addImages(array $images = array())
    {
        foreach ($images AS $image) {
            $this->addImage($image);
        }
        return $this;
    }

    public function addImage($data)
    {
        if (!is_array($data)) {
            $data = array(
                'src' => $data
            );
        }
        $image = new Gallery_Image($data);
        $image->setGallery($this);
        array_push(
            $this->images,
            $image
        );
        return $this;
    }


    public function render()
    {
        $imagesHtml = "";

        foreach ($this->images as $image) {
            /** @var Gallery_Image $image */
            if($image->getData('title')){
                $imagesHtml .= '<img src ="' . $image->getData('src'). '" title="' . $image->getData('title') . '">';
            } else {
                $imagesHtml .= '<img src ="' . $image->getData('src') . '">';
            }
        }

        return '
                <div class="slider-holder col-xs-12 col-md-12 col-lg-12">
                    <div class="galleria">' . $imagesHtml . '
                    </div>
                </div>
                <script>
                    Galleria.loadTheme("' . $this->getThemeUrl() . '");
                    Galleria.run(".galleria");
                </script>';
    }

}