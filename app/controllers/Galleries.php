<?php 


    class Galleries extends Controller{
        public function __construct(){
            $this->galleryModel = $this->model('gallery');
        }

        public function index(){
            $rowGallery = $this->galleryModel->showGallery();
            $rowImages = $this->galleryModel->showImages();
            $data = [
                'gallery' => $rowGallery,
                'images' => $rowImages 
            ];

            $this->view('gallery/index' , $data);
        }

        public function new_gallery(){
            $data = [];

            $this->view('gallery/multiple_uploads' , $data);
        }

        public function showChangeModal(){
            $gal_id = $_POST['gid'];
            $gallery_images = $this->galleryModel->showImagesByGalId($gal_id);

            $data =[
                'images' => $gallery_images
            ];

            $this->view('gallery/cover_photo_modal', $data);
        }

        public function changeCover(){
            $image_id = $_POST['image_id'];
            $gallery_id = $_POST['gallery_id'];
            if($this->galleryModel->changeCover($image_id, $gallery_id)){
                echo "1";
            }   
        }

        public function editGallery($gal_id){
            $gallery = $this->galleryModel->showGalleryById($gal_id);
            $gallery_images = $this->galleryModel->showImagesByGalId($gal_id);

            $data = [
                'gallery' => $gallery,
                'images' => $gallery_images
            ];

            $this->view('gallery/edit', $data);
        }

        public function editDesc(){
            $image_id = $_POST['image_id'];
            $newDesc = $_POST['description'];

            $data= [
                'image_id' => $image_id,
                'description' => $newDesc
            ];

            if($this->galleryModel->editDesc($data)){
                echo "1";
            }
        }

        public function deleteGallery($gal_id){
            if($this->galleryModel->deleteGallery($gal_id)){
                if($this->galleryModel->deleteImagesByGalId($gal_id)){
                    redirect('galleries');
                }
            }
        }

        public function deleteImage(){
            $image_id = $_POST['image_id'];

            if($this->galleryModel->deleteImageById($image_id)){
                echo "1";
            }
                
            
            
        }

        public function multi_edit(){
            //array_print($_FILES);
            //array_print(json_decode($_POST['descriptions']));
            //array_print($_POST);
            
            if(!empty($_FILES)){
                $galImgCount = $this->galleryModel->showImagesByGalId($_POST['gallery_id']);

                $data = [
                    'gallery_id' => $_POST['gallery_id'],
                    'gallery_title' => $_POST['gallery_title'],
                    'created_by' => 'Jus Pads',
                    'img_count' => count($galImgCount)
                ];

                //array_print($data);

                if($this->galleryModel->editGallery($data)){
                    if($this->imageUpload($data)){
                        echo "1";
                    }
                }
            }
            else{

                $data = [
                    'gallery_id' => $_POST['gallery_id'],
                    'gallery_title' => $_POST['gallery_title'],
                    'created_by' => 'Jus Pads',
                ];
                
                if($this->galleryModel->editGallery($data)){
                    echo "1";
                }
            }
            
            
        }


        public function multi_add(){
             
            // array_print(json_decode($_POST['descriptions']));

            if(!empty($_FILES)){
                 
                $data = [
                    'gallery_id' => '',
                    'gallery_title' => $_POST['gallery_title'],
                    'created_by' => 'Jus Pads',
                    'img_count' => 0
                ];

                $gid = $this->galleryModel->addGallery($data);
                $data['gallery_id'] = $gid;
               
                if($this->imageUpload($data)){
                    echo "1";
                }
            }
            else{
                $data = [
                    'gallery_title' => $_POST['gallery_title'],
                    'created_by' => 'Jus Pads',
                ];

            
                if($this->galleryModel->addGallery($data)){
                    echo '1';
                }
            }
           
        }

        public function imageUpload($newData){
        
            foreach($_FILES as $key => $file){
                //array_print($file);
                $description = json_decode($_POST['descriptions']);
                $data = [
                    'gallery_id' => $newData['gallery_id'],
                    'file' => '',
                    'description' => $description[$key],
                    'isCover' => 0
                ];

                if($key == 0 && $newData['img_count'] == 0){
                    $data['isCover'] = 1;
                }
                
                $filename = $file['name'];
                $fileTmpName = $file['tmp_name'];
                $fileSize = $file['size'];
                $fileError = $file['error'];
                $fileType = $file['type'];

                $fileExt = explode ('.',$filename);
                $fileActualExt = strtolower(end($fileExt));
                $allowed = array('jpg','jpeg', 'png', 'pdf' ,'jfif');

                if(in_array($fileActualExt, $allowed)){
                    if( $fileError === 0){
                        if($fileSize < 2500000){        
                            $fileNameNew = uniqid('',true).".".$fileActualExt; //filenamenew papasok db
                            $target = "uploads/". basename($fileNameNew);
                            move_uploaded_file($fileTmpName, $target);
                            
                            $data['file'] = $fileNameNew;
                        }
                    }
                    else{
                        die("File size too big");
                    }
                }
                //array_print($data);
               
                $addedImg[] = $this->galleryModel->addImgGallery($data);
            }
          
            if($addedImg){
                echo '1';
            }
        }

    }