<?php
require_once('tcpdf/config/lang/eng.php');
require_once('tcpdf/tcpdf.php');
require_once('include/database/PearDatabase.php');
require_once('include/utils/utils.php');
require_once('config.inc.php');
//*******************************************

$qry = "SELECT * FROM `vtiger_account` WHERE accountid = ".$_REQUEST['record'];
$rslt = mysql_query($qry);
$row = mysql_fetch_array($rslt);
//****************************************** 

// extend TCPF with custom functions
class MYPDF extends TCPDF {
	// Load table data from file
	public function LoadData() {
	
//Code added by vasim for getting 1st day of month
$d = '01' ;
$m = date(m);
$y = date(Y);
$date = $y.'-'.$m.'-'.$d.' '.'00:00:00';
//echo '<br/>';
$cuurentdate = date("Y-m-d H:i:s");
//***********End******
//echo '<br/>';
	
 $query = "SELECT * FROM vtiger_troubletickets as vtticket
INNER JOIN vtiger_ticketcf ON vtiger_ticketcf.ticketid = vtticket.ticketid
INNER JOIN vtiger_crmentity ON vtticket.ticketid = vtiger_crmentity.crmid
INNER JOIN vtiger_account ON vtticket.parent_id = vtiger_account.accountid
LEFT JOIN vtiger_users ON vtiger_crmentity.smownerid = vtiger_users.id
LEFT JOIN vtiger_groups ON vtiger_crmentity.smownerid = vtiger_groups.groupid 
WHERE vtiger_crmentity.deleted=0 and vtticket.status = 'closed' and vtticket.parent_id = '".$_REQUEST['record']."' and createdtime BETWEEN '".$date."' and '".$cuurentdate."' group by vtticket.ticketid";	 
//exit();						
$result = mysql_query($query);
if($result)
$countrows=mysql_num_rows($result);
	
if($countrows>0)
 {
while($row = mysql_fetch_array($result))
{
		$data[] = $row;
		}
		return $data;
	}
}
	// Colored table
	public function ColoredTable($header,$data) {
		// Colors, line width and bold font
		$this->SetFillColor(192, 192, 192);//vasim
		$this->SetTextColor(0);//vasim
		$this->SetDrawColor(128, 0, 0);
		$this->SetLineWidth(0.3);
		$this->SetFont('', 'B');
		// Header
		
		$w = array(42, 23, 23, 23, 55, 25);//vasim
		$num_headers = count($header);
		for($i = 0; $i < $num_headers; ++$i) {
			$this->Cell($w[$i], 7, $header[$i], 1, 0, 'C', 1);
		}
		$this->Ln();
		// Color and font restoration
		$this->SetFillColor(224, 235, 255);
		$this->SetTextColor(0);
		$this->SetFont('');
		// Data
		$total =0;
		$fill = 0;
	if($data)
	{
		foreach($data as $row)
		 {
            $solution = substr($row['solution'],0,20);

//			$this->MultiCell(42, 55, $row['createdtime'], 1, 'J', 1, 0, '', '', true, 0, false, true, 0);
//			$this->MultiCell(23, 55, $row['cf_616'], 1, 'J', 1, 0, '', '', true, 0, false, true, 0);
//			$this->MultiCell(23, 55, $row['cf_617'], 1, 'J', 1, 0, '', '', true, 0, false, true, 0);
//			$this->MultiCell(23, 55, $row['hours'], 1, 'J', 1, 0, '', '', true, 0, false, true, 0);
//		    $this->MultiCell(55, 55, substr($row['solution'],0,30), 1, 'J', 1, 0, '', '', true, 0, false, true, 0);
//			$this->MultiCell(25, 55, $row['user_name'], 1, 'J', 1, 0, '', '', true, 0, false, true, 0);
			$this->Cell($w[0], 6, $row['createdtime'], 'LR', 0, 'L', $fill);
			$this->Cell($w[1], 6, $row['cf_616'], 'LR', 0, 'L', $fill);
			$this->Cell($w[2], 6, $row['cf_617'], 'LR', 0, 'R', $fill);
			$this->Cell($w[3], 6, $row['hours'], 'LR', 0, 'R', $fill);
			$this->Cell($w[4], 6, $solution.'..', 'LR', 0, 'R', $fill);
			$this->Cell($w[5], 6, $row['user_name'], 'LR', 0, 'R', $fill);
			$this->Ln();
			$fill=!$fill;
			$total = $total+$row['hours'];
		}
		$this->Cell(array_sum($w), 0, '', 'T');
		
	}
	$html='Total Hours :'.$total;
	$this->writeHTML($html, true, false, true, false, '');
		
}
}

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nexus IT');
$pdf->SetTitle('Client Monthly Usage Log');
$pdf->SetSubject('');
$pdf->SetKeywords('');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.'Client Monthly Usage Log', PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

//set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

//set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

//set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

//set some language-dependent strings
$pdf->setLanguageArray($l);

// ---------------------------------------------------------

// set font
$pdf->SetFont('helvetica', '', 12);

// add a page
$pdf->AddPage();
$account = substr($row['accountname'],0,25);
// -----------Vasim changes for adding month and account name-------------------
$html = '<pre><p>'.'Month:'.date(F).'                     Client:'.$account.'</p></pre>';
// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');

//Column titles
$header = array('Date', 'Start Time', 'End Time','Total Time','Detail of Work Performed', 'Technician');
$data = $pdf->LoadData('tcpdf/cache/table_data_demo.txt');

// print colored table
$pdf->ColoredTable($header, $data);

// ---------------------------------------------------------

//Close and output PDF document
$filename = 'pdf/';
$pdf->Output('pdf/'.$_REQUEST['record'].'.pdf', 'F');
//$pdf->Output('', 'I');
				
//-----------------------------------------Send Mail by vasim----------------------------------------------------//	
require("tcpdf/classes/attach_mailer_class.php");

if(isset($row['email1']) && !empty($row['email1'])){
$test = new attach_mailer($name = "Nexus IT Team", $from = "techstaff@nexusitc.net", $to = $row['email1'], $cc = "", $bcc = "", $subject = "Monthly Report:--".date(F), $body = "Hello, 

Please find attached report.

Thanks & Regards,
Nexus IT Tech Team");
}elseif(isset($row['email2']) && !empty($row['email2'])){
$test = new attach_mailer($name = "Nexus IT Team", $from = "techstaff@nexusitc.net", $to = $row['email2'], $cc = "", $bcc = "", $subject = "Monthly Report", $body = "Hello, 

Please find attached report.

Thanks & Regards,
Nexus IT Tech Team");
}else{
$test = new attach_mailer($name = "Nexus IT Team", $from = "techstaff@nexusitc.net", $to = "techstaff@nexusitc.net", $cc = "", $bcc = "", $subject = "Monthly Report", $body = "Hello, 

Please find attached report.

Thanks & Regards,
Nexus IT Tech Team");
}

$val = $test->create_attachment_part("pdf/".$_REQUEST['record'].".pdf"); 

$test->process_mail();

header("refresh: 0; url=index.php?module=Accounts&parenttab=Marketing&action=DetailView&record=".$_REQUEST['record']."");

//-----------------------------------------------------------------------------------------------------------------//
//============================================================+
// END OF FILE                                                
//============================================================+
