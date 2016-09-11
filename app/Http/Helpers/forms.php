<?php

/*
|--------------------------------------------------------------------------
| Form Helpers
|--------------------------------------------------------------------------
*/

	/**
	 * Create a Basic Form Field
	 *
	 * @return string
	 */
	function makeBaseForm($formField, $name, $label, $default, $placeholder, $required, $errors, $class = '')
	{
		$feedback = $errorClass = '';

		if ($errors->has($name))
		{
            $feedback = '<span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
            <span id="inputError2Status" class="sr-only">(error)</span>';
            $errorClass = 'has-error has-feedback';
		}

		return '
            <div class="form-group '.$errorClass.'">
		        <label class="control-label" for="'.$name.'">'.$label.'</label><br/>
		        '.$formField.'
		        '.$feedback.'
		    </div>
		';
	}

	/**
	 * Create a Text Field
	 *
	 * @return string
	 */
	function makeTextField($name, $label, $default, $placeholder, $required, $errors, $class = '')
	{
		$formField = Form::text($name, $default, [''.$required.'', 'placeholder' => ''.$placeholder.'', 'class' => ''.$class.' form-control']);
		return makeBaseForm($formField, $name, $label, $default, $placeholder, $required, $errors, $class = '');
	}

	/**
	 * Create a Text Field
	 *
	 * @return string
	 */
	function makeEmailField($name, $label, $default, $placeholder, $required, $errors, $class = '')
	{
		$formField = Form::email($name, $default, [''.$required.'', 'placeholder' => ''.$placeholder.'', 'class' => ''.$class.' form-control']);
		return makeBaseForm($formField, $name, $label, $default, $placeholder, $required, $errors, $class = '');
	}

	/**
	 * Create a Text Field
	 *
	 * @return string
	 */
	function makeTextAreaField($name, $label, $default, $placeholder, $required, $errors, $class = '')
	{
		$formField = Form::textarea($name, $default, [''.$required.'', 'placeholder' => ''.$placeholder.'', 'class' => ''.$class.' form-control']);
		return makeBaseForm($formField, $name, $label, $default, $placeholder, $required, $errors, $class = '');
	}

	/**
	 * Create a Text Field
	 *
	 * @return string
	 */
	function makePasswordField($name, $label, $default, $placeholder, $required, $errors, $class = '')
	{
		$formField = Form::password($name, [''.$required.'', 'placeholder' => ''.$placeholder.'', 'class' => ''.$class.' form-control']);
		return makeBaseForm($formField, $name, $label, $default, $placeholder, $required, $errors, $class = '');
	}

	/**
	 * Create a Text Field
	 *
	 * @return string
	 */
	function makeInputField($name, $label, $default, $placeholder, $required, $errors, $class = '')
	{
		$formField = Form::email($name, $default, [''.$required.'', 'placeholder' => ''.$placeholder.'', 'class' => ''.$class.' form-control']);
		return makeBaseForm($formField, $name, $label, $default, $placeholder, $required, $errors, $class = '');
	}				