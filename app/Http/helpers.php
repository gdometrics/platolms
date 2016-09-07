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
