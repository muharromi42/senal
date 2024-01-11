<?php
require('../../../plugins/fpdf/fpdf.php');
header('Content-Type: application/pdf');
header('Content-Disposition: inline; filename="' . $namafile . '"');
