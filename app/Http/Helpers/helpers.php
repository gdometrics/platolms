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

	/**
	 * Make a label for the role of a user
	 *
	 * @return string
	 */			
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
	function getUserImage($id, $img, $email, $size='50', $class='thumbnail media-object', $style=''){

		if ($img)
		{
        	// For FB pics, use the full URL
	        if (substr($img, 0, 4) == "http")
	        {
                return '<img src="' . $img . '" class="' . $class . '" width="'.$size.'" style="'.$style.'">';
	        } else {

	        	if ($size < Config::get('settings.user_image_resize'))
	        	{
		            return '<img src="/avatars/r/'. $id . '/' . $img . '" width="'.$size.'" class="' . $class . '" style="'.$style.'">';
	        	}

	            return '<img src="/avatars/'. $id . '/' . $img . '" width="'.$size.'" class="' . $class . '" style="'.$style.'">';
	        }

		} else {

			// Return Gravatar
            return '<img src="https://www.gravatar.com/avatar/' . md5($email) . '?s=' . $size . '&d=identicon&r=PG" class="' . $class . '" style="'.$style.'">';

		}

	}
