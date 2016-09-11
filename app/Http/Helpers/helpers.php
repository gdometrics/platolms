<?php

/*
|--------------------------------------------------------------------------
| Helpers
|--------------------------------------------------------------------------
*/

	/**
	 * Get the columns 
	 *
	 * @return string
	 */
	function getColumns($columnNumber = '12', $offset = null)
	{
		if ($offset)
		{
			return 'col-md-'.$columnNumber . ' ' . 'col-md-offset-' . $offset;
		}

		return 'col-md-'.$columnNumber;
	}

	/**
	 * Make a random password
	 *
	 * @return string
	 */
	function makeRandomPassword()
	{
		return str_random(rand(7,20));
	}
			
	function makeRoleLabel($roleName, $abbreviation = false)
	{
		switch ($roleName)
		{
			case 'Super Admin';
				$label = 'red';
				$role = 'Super Admin';			
				if ($abbreviation)
				{
					$role = 'SA';
				}
				break;
			case 'Admin';
				$label = 'info';
				$role = 'Admin';			
				if ($abbreviation)
				{
					$role = 'A';
				}
				break;
			case 'Editor';
				$label = 'warning';
				$role = 'Editor';			
				if ($abbreviation)
				{
					$role = 'E';
				}
				break;
			case 'Instructor';
				$label = 'success';
				$role = 'Instructor';			
				if ($abbreviation)
				{
					$role = 'I';
				}
				break;
			case 'Student';
				$label = 'primary';
				$role = 'Student';			
				if ($abbreviation)
				{
					$role = 'S';
				}
				break;
			default:
				$label = 'success';
				$role = 'S';
		}

		return '<span class="label label-'.$label.'">'.$role.'</span>';
	}

	/**
	 * Gets the image for a user
	 *
	 * @return string
	 * @todo -> move this to the user class
	 */
	function getUserImage($id, $size='50', $class='thumbnail media-object', $urlOnly=false, $style=''){

		// return '<img src="/img/avatar-small.jpg" width="'.$size.'" class="' . $class . '" style="'.$style.'">';

	    // Get the user info from the table
	    $user = \DB::table('users')->where('id', $id)->first();
	    if (($user->img == '') || ($user->img == NULL))
	    {
	        if ($urlOnly == true) {
	            return 'https://www.gravatar.com/avatar/' . md5($user->email) . '?s=' . $size . '&d=identicon&r=PG';
	        } else {
	            return '<img src="https://www.gravatar.com/avatar/' . md5($user->email) . '?s=' . $size . '&d=identicon&r=PG" class="' . $class . '" style="'.$style.'">';
	        }
	    } else {

	        if (substr($user->img, 0, 4) == "http")
	        {
	            if ($urlOnly == true) {
	                return $user->img;
	            } else {
	                return '<img src="' . $user->img . '" class="' . $class . '" width="'.$size.'" style="'.$style.'">';
	            }
	        } else {

	        	// first, let's set the path
			    $path = storage_path().'/uploads/' . str_slug($user->name) . '/avatar/';

			    // check for a resized img
				// if ( ! File::isDirectory($path . 'resized/') and $path . 'resized/') @File::makeDirectory($path . 'resized/', 0777, true);

				// open an img file
				// $img = \Image::make($path . $user->avatar);
				
				// resize img instance
				// $img->resize(350, 350);
				
				// save img in desired format
				// $img->save($path . 'resized/' . $user->avatar);
		        
	            if ($urlOnly == true) {
	                return $path . $user->img;
	            } else {
		            return '<img src="/avatars/' . $user->id . '" width="'.$size.'" class="' . $class . '" style="'.$style.'">';
	            }

	        }

	    }
	}
