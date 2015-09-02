<?php

// Path to your lessc executable.  This can be installed
// easily using npm.  Just run `npm install less`.  See
// the LESS site for more info: http://lesscss.org
$path_to_lessc = 'sass';

// Enable minified output for file requests ending
// in '.min.css'.  If disabled, files ending in '.min.css'
// will still compile – just not as a minified version
$enable_minified = TRUE;

//////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////
$seconds_to_cache = 3600;
$ts               = gmdate("D, d M Y H:i:s", time() + $seconds_to_cache) . " GMT";
$output           = $exit_status = NULL;

$css = $_GET['path'];
$min = $_GET['min'];
$less = str_replace(".css", ".scss", $css);
$less = str_replace(".min", "", $less);

if (file_exists($less))
{
	header("Expires: $ts");
	header("Pragma: cache");
	header("Cache-Control: max-age=$seconds_to_cache");
	header("Content-type: text/css");

	// Minify if requested
	if ($enable_minified && ($min == 'yes'))
		$less_command = $path_to_lessc . " -x " . realpath($less) . ' 2>&1';
	else
		$less_command = $path_to_lessc . " " . realpath($less) . ' 2>&1';

	// Run the command and catch the output and the error code
	exec($less_command, $output_lines, $exit_status);
	$was_successful = ($exit_status == 0) ? TRUE : FALSE;

	if ($was_successful)
	{
		// Just output the CSS
		foreach ($output_lines as $output_line) echo $output_line . "\n";
	}
	else
	{
		// Output the errors while stripping out any command line color codes
		$output_lines = preg_replace('/\[[0-9][0-9]?m/', '', $output_lines);
		foreach ($output_lines as $output_line) echo $output_line . "\n";
	}
}
else if (file_exists($css))
{
	header("Expires: $ts");
	header("Pragma: cache");
	header("Cache-Control: max-age=$seconds_to_cache");
	header("Content-type: text/css");
	echo file_get_contents($css);
}
else
{
	header("HTTP/1.0 404 Not Found");
	echo "Not Found";
}

?>