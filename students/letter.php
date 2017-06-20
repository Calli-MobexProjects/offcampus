
<?php 
header("Content-type: application/pdf");


/*include('../../connect.php');
$fetch=mysql_query("SELECT * FROM teaching_practice  WHERE ID='$ses_id' "); 
    if($fetch){
    $row=mysql_fetch_assoc($fetch); 
    
    $First_name=$row['First_name']; 
    $Middle_name=$row['Middle_name']; 
    $Surname=$row['Surname']; 
    $Gender=$row['Gender']; 
    $Mode=$row['Ad_Mode'];
    $Nationality=$row['Nationality'];
    $Program=$row['Program_1'];
    $DOB=$row['DOB']; 
    $Image_name=$row['Image_Name'];
    $ID=$row['Id_Number'];
    $Account_number=$row['Account_Number'];    
    $Name=$First_name.' '.$Middle_name.' '.$Surname;
    $Image='uploads/'.$Image_name;*/
   
require('fpdf/fpdf.php');
   
    
class PDF extends FPDF
{
     
// Page header
function Header()
{
  $time=date("Y/m/d h:i:sa");  
  
   
    $this->Ln(4);
   // $this->Cell(0,0,'',1,1,'');
    // Line break
    $this->Ln(30);
}


// Page footer
function Footer()
{

    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
   
}
}

// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',9);
$pdf->Cell(180,4,'January 8,2017',0,1);
  $pdf->Ln(10);

$pdf->Cell(180,4,'The Head Teacher',0,1);
$pdf->Cell(180,4,'Mankraso Senior High School',0,1);
$pdf->Cell(180,4,'Mankraso-Afoano South',0,1);
$pdf->Cell(180,4,'Ahanti Region',0,1);
  
$pdf->Ln(8);

$pdf->Cell(180,4,'Dear Sir/Madam,',0,1);

$pdf->Ln(8);

$pdf->SetFont('Times','U',10);
$pdf->Cell(180,4,'PERMISSION:OFF-CAMPUS TEACHING PRACTICUM',0,1);

$pdf->Ln(2);

$pdf->SetFont('Times','',9);
$pdf->Cell(180,4,'As part of our training programme, all level 300 students of the Education Department of Valley View University are',0,1);
$pdf->Cell(180,4,'required to acquire knowlegde in Off-Campus Teaching. Practicum. On behalf of the University, I write to seek permission',0,1);
$pdf->Cell(180,4,'from you to enable the below mentioned student to teaach in your reputable institution from January 23, 2017 to March 17, 2017.',0,1);



$pdf->Ln(4);

$pdf->Cell(50,4,'Name of Student                          :',0,0);
$pdf->Cell(70,4,'Antwi Linder    ',0,1);

$pdf->Ln(2);

$pdf->Cell(50,4,'ID Number                                   :',0,0);
$pdf->Cell(70,4,'216EEK0100221   ',0,1);

$pdf->Ln(2);

$pdf->Cell(50,4,'Program                                       :',0,0);
$pdf->Cell(70,4,'English  ',0,1);

$pdf->Ln(4);

$pdf->Cell(100,4,'Thank you in anticipation for your favorable consideration in this direction',0,1);

$pdf->Ln(4);

$pdf->Cell(70,4,'Yours faithfully,',0,1);


$pdf->Ln(20);

$pdf->Cell(70,4,'Abraham Okrah',0,1);

$pdf->SetFont('Times','I',9);
$pdf->Cell(180,4,'(Off-campus Coordinator)',0,1);

$pdf->Ln(6);


$pdf->SetFont('Times','',10);
$pdf->Cell(70,4,'Cc:',0,1);
$pdf->Cell(180,4,'                          Head Of Department',0,1);

$pdf->Output();        

    
        
?>