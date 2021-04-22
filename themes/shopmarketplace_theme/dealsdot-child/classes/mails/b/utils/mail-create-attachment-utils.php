<?php 

    namespace Mails;

    class MailCreateAttachmentUtils {

        public static function create($filename = 'attachments.zip', $galleries) {

            $zip = new ZipArchive;

            $file_path = dirname(__FILE__) . '/' . $filename;

            $res = $zip->open($file_path, ZIPARCHIVE::CREATE | ZIPARCHIVE::OVERWRITE );

            if ( $res === TRUE ) :

                //echo 'abc'; die();

                foreach ($galleries as $key => $url) :

                    $needed = $_SERVER['SERVER_NAME'] . '/';

                    $pos = strpos($url, $needed);

                    if ( FALSE !== $pos ) :

                        $s_path = substr($url, $pos + strlen($needed) );
                        $path = ABSPATH . $s_path;

                        //echo $path; die();

                        // Add file to the zip file
                        $zip->addFile($path);				    

                    endif;

                endforeach;
            
                // All files are added, so close the zip file.
                $zip->close();

            else :

                var_dump($res);		

            endif;

		    return $file_path;

        }

    }