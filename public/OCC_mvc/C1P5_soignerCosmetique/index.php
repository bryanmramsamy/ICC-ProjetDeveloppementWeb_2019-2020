<?php
require('model.php');

$req = getBillets();

require('indexView.php');

# The closing tag   ? >   MUST be omitted from files containing only PHP.
# This is in order to prevent posting blank html pages.
# The PHP tag is automatically closed at the EOF.