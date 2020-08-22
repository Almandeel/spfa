<script type="text/javascript">
	// Validation errors messages for Parsley
	Parsley.addMessages('{{ app()->getLocale() }}', {
	  defaultMessage: "@lang('parsley.defaultMessage')",
	  type: {
	    email: "@lang('parsley.email')",
	    url: "@lang('parsley.url')",
	    number: "@lang('parsley.number')",
	    integer: "@lang('parsley.integer')",
	    digits: "@lang('parsley.digits')",
	    alphanum:  "@lang('parsley.alphanum')",
	  },
	  notblank: "@lang('parsley.notblank')",
	  required: "@lang('parsley.required')",
	  pattern: "@lang('parsley.pattern')",
	  min: "@lang('parsley.min')",
	  max: "@lang('parsley.max')",
	  range: "@lang('parsley.range')",
	  minlength: "@lang('parsley.minlength')",
	  maxlength: "@lang('parsley.maxlength')",
	  length: "@lang('parsley.length')",
	  mincheck: "@lang('parsley.mincheck')",
	  maxcheck: "@lang('parsley.maxcheck')",
	  check: "@lang('parsley.check')",
	  equalto: "@lang('parsley.equalto')",
	});

	Parsley.setLocale('{{ app()->getLocale() }}');
</script>