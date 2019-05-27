<?php
//============================================================+
// File name   : example_008.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 008 for TCPDF class
//               Include external UTF-8 text file
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Include external UTF-8 text file
 * @author Nicola Asuni
 * @since 2008-03-04
 */

// Include the main TCPDF library (search for installation path).
require_once('tcpdf_include.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('TCPDF Example 008');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 008', PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set default font subsetting mode
$pdf->setFontSubsetting(true);

// set font
$pdf->SetFont('freeserif', '', 12);

// add a page
$pdf->AddPage();

// get esternal file content
// $utf8text = file_get_contents('data/utf8test.txt', false);
$utf8text = "અનુચ્છેદ ૨૬:	
1)દરેક વ્યક્તિને શિક્ષણનો અધિકાર છે. ઓછામાં ઓછું પ્રાથમિક અને પાયાના તબક્કાઓમાં શિક્ષણ મફત રહેશે. પ્રાથમિક શિક્ષણ ફરજિયાત રહેશે. વિશેષ વિઘાવિષયક અને વ્યવસાયી શિક્ષણ સામાન્યતઃ ઉપલબ્ધ રહેશે અને યોગ્યતાના ધોરણ પર ઉચ્ચ શિક્ષણ પ્રાપ્ત કરવાનો સર્વને સમાન અધિકાર રહેશે.
2)માનવવ્યક્તિત્વના સંપૂર્ણ વિકાસ અને માનવહક્કો અને મૂળભૂત સ્વતંત્રતાઓ પ્રત્યેના માનને દઢિભૂત કરવા તરફ શિક્ષણનું લક્ષ રાખવામાં આવશે. બધાં રાષ્ટ્રો, જાતિ અથવા ધાર્મિક સમૂહો વચ્ચે તે સમજ, સહિષ્ણુતા અને મૈત્રી બઢાવશે અને શાંતિની જાળવણી માટેની સંયુકત રાષ્ટ્રોની પ્રવૃત્તિઓને આગળ ધપાવશે.
3)પોતાનાં બાળકોને કયા પ્રકારનું શિક્ષણ આપવું તે પસંદ કરવાનો પ્રથમ અધિકાર માબાપોને રહેશે.
અનુચ્છેદ ૨૭:	
1)કોમના સાંસ્કૃતિક જીવનમાં છૂટથી ભાગ લેવાનો, કલાઓનો આનંદ માણવાનો અને વૈજ્ઞાનિક પ્રગતિ અને તેના લાભોમાં ભાગીદાર થવાનો દરેક વ્યક્તિને અધિકાર છે.
2)વૈજ્ઞાનિક, સાહિત્યિક અથવા કલાત્મક સર્જન જેનાં તે પોતે કર્તા હોય તેમાંથી ઊભાં થતાં નૈતિક અને ભૌતિક હિતોના રક્ષણ માટેનો દરેક વ્યક્તિનો અધિકાર છે.";

// set color for text
$pdf->SetTextColor(0, 63, 127);

// write the text
$pdf->Write(5, $utf8text, '', 0, '', false, 0, false, false, 0);


// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('example_008.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
