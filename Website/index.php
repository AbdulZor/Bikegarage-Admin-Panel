<?php
header( 'Content-type: text/html; charset=utf-8' ); // make sure this is set

//header("Location: ./Views/login.php", true, 307 ); // 307 is temporary redirect
header("Location: ./Views/login.php");
echo "<html></html>";  // - Tell the browser there the page is done
flush();               // - Make sure all buffers are flushed
ob_flush();            // - Make sure all buffers are flushed
exit;                  // - Prevent any more output from messing up the redirect