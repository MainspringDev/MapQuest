<?php

$finder = Symfony\CS\Finder\DefaultFinder::create()
	->in('src')
	->in('tests');

return Symfony\CS\Config\Config::create()
	->level(Symfony\CS\FixerInterface::NONE_LEVEL)
	->fixers([
		'align_double_arrow',
		'array_element_no_space_before_comma',
		'blankline_after_open_tag',
		'concat_with_spaces',
		'duplicate_semicolon',
		'elseif',
		'encoding',
		'eof_ending',
		'function_call_space',
		'function_declaration',
		'lowercase_constants',
		'lowercase_keywords',
		'method_argument_space',
		'no_blank_lines_after_class_opening',
		'object_operator',
		'ordered_use',
		'paces_before_semicolon',
		'parenthesis',
		'php_closing_tag',
		'php_closing_tag',
		'standardize_not_equal',
		'trailing_spaces',
		'visibility',
	])
	->setUsingCache(true)
	->setUsingLinter(false)
	->finder($finder);