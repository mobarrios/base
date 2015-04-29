<?php
 
 class Upload 
{
	
	public static function up($file = null , $path = null)
	{

		if($file)
		{
			//valida tipo de archivo
			if($file->getMimeType() == 'image/jpeg' || $file->getMimeType() == 'image/gif' || $file->getMimeType() == 'image/png' ||   $file->getMimeType() == 'application/msword' || $file->getMimeType() == 'application/excel' || $file->getMimeType() == 'application/pdf' || $file->getMimeType() == 'application/zip')
			{
	
				$date 	  		=  new DateTime();	
				$filename 		=  $date->getTimestamp().".".$file->getClientOriginalExtension();
			
				$upload_success =  $file->move(public_path($path) , $filename);

				if( $upload_success ) {

					return $path.$filename;
					//$novedad->imagen = $filename ;

				} else {

					return false;

				}	
			}else{

				return false;
			}
		}

	}

	public static function del($file = null, $path = null)
	{
		
			File::delete(public_path($file));	
			
	}
}

 ?>