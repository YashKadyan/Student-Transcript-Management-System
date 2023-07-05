<?php
    session_start();
    require_once('../../Database/connection.php');
    if(!isset($_SESSION['uid']))
    {
        echo"<script>alert('Unauthorised access!!!');</script>";
        die();
    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $cid = test_input($_REQUEST["clg"]);    //College ID

    $res = mysqli_query($connection,"SELECT college_name FROM college WHERE college.college_id=$cid");
    $result = mysqli_fetch_assoc($res);

    $dres = mysqli_query($connection,"SELECT * FROM department WHERE college_id=$cid");

    ob_start(); 
    require_once ('fpdf.php');
    $pdf = new FPDF('P','mm','A3');
    $pdf->AddPage();

	$start_x=$pdf->GetX();
	$current_y = $pdf->GetY();
	$current_x = $pdf->GetX();

    $pdf->SetFont('Times','',16);  
    $pdf->Cell(0,10,$result['college_name'],0,1,'C');
    $pdf->Cell(0,10,'Departmental Report',0,1,'C');
    $pdf->Cell(150);
    $pdf->Cell(130,25,'Date: '.date("d/m/Y"),0,1,'R');

    $pdf->SetFont('Times','B',13);
    $width_cell=array(30,50,25,25,30,26,26,26,26);
    $pdf->SetFillColor(193,229,252);


	$start_x=$pdf->GetX()+50; 
    $current_y = $pdf->GetY();
    $current_x = $pdf->GetX()+20;

    $pdf->SetXY($current_x, $current_y);
    $start_x=$pdf->GetX();
    $pdf->MultiCell($width_cell[0],10,'Department ID',1,'C',true);
    
    $current_x += $width_cell[1]-20;
    $pdf->SetXY($current_x, $current_y);
    $pdf->MultiCell($width_cell[1],20,'Department Name',1,'C',true);

    $current_x += $width_cell[1];
    $pdf->SetXY($current_x, $current_y);
    $pdf->MultiCell($width_cell[2],10,'No of Courses',1,'C',true); 

    $current_x += $width_cell[2];
    $pdf->SetXY($current_x, $current_y);
    $pdf->MultiCell($width_cell[3],10,'No of Benches',1,'C',true); 

    $current_x += $width_cell[3];
	$pdf->SetXY($current_x, $current_y);               
    $pdf->MultiCell($width_cell[4],10,'No of Classrooms',1,'C',true);

    $current_x += $width_cell[4];
	$pdf->SetXY($current_x, $current_y);
    $pdf->MultiCell($width_cell[5],10,'No of Computers',1,'C',true);                        
 
    $current_x += $width_cell[5];
	$pdf->SetXY($current_x, $current_y);
    $pdf->MultiCell($width_cell[6],10,'No of Faculties',1,'C',true);
    
    $current_x += $width_cell[6];
	$pdf->SetXY($current_x, $current_y);
    $pdf->MultiCell($width_cell[7],10,'No of Students',1,'C',true);
    
    $pdf->SetFont('Times','',12);
    $pdf->SetFillColor(235,236,236); 
     
    $fill=false;            //to give alternate background fill color to rows

    $pdf->Ln();
    $current_x=$start_x;    //set x to start_x (beginning of line)
    $current_y+=20;

    while($dept_data = mysqli_fetch_assoc($dres))
    {    
        $pdf->SetXY($current_x, $current_y);
        $pdf->MultiCell($width_cell[0],10,$dept_data['dept_id'],1,'C',$fill);

        $current_x += $width_cell[1]-20;
        $pdf->SetXY($current_x, $current_y);
        $pdf->MultiCell($width_cell[1],10,$dept_data['dept_name'],1,'C',$fill);

        $sql = "SELECT count(c_name) FROM course WHERE dept_id=".$dept_data['dept_id'];
        $course_result = mysqli_query($connection,$sql);
        $course_data = mysqli_fetch_row($course_result);
        $current_x += $width_cell[1];
        $pdf->SetXY($current_x, $current_y);
        $pdf->MultiCell($width_cell[2],10,$course_data[0],1,'C',$fill);
        
        $current_x += $width_cell[2];
        $pdf->SetXY($current_x, $current_y);
        $pdf->MultiCell($width_cell[3],10,$dept_data['no_of_benches'],1,'C',$fill); //print one cell value
    
        $current_x += $width_cell[3];
        $pdf->SetXY($current_x, $current_y);               //set position for next cell to print
        $pdf->MultiCell($width_cell[4],10,$dept_data['no_of_classrooms'],1,'C',$fill);
        
        $current_x += $width_cell[4];
        $pdf->SetXY($current_x, $current_y);
        $pdf->MultiCell($width_cell[5],10,$dept_data['no_of_computers'],1,'C',$fill);                        
        
        $cres = mysqli_query($connection,"SELECT count(faculty_id) FROM faculty WHERE college_id=$cid and dept_id=".$dept_data['dept_id']);
        $fcount = mysqli_fetch_array($cres);
        $current_x += $width_cell[5];
        $pdf->SetXY($current_x, $current_y);
        $pdf->MultiCell($width_cell[6],10,$fcount[0],1,'C',$fill);

        $cres = mysqli_query($connection,"SELECT count(roll_no) FROM student WHERE college_id=$cid and dept_id=".$dept_data['dept_id']);
        $scount = mysqli_fetch_array($cres);
        $current_x += $width_cell[6];
        $pdf->SetXY($current_x, $current_y);
        $pdf->MultiCell($width_cell[7],10,$scount[0],1,'C',$fill);

        $pdf->Ln();
        $current_x=$start_x;        //set x to start_x (beginning of line)
        $current_y+=10;             
        $fill = !$fill;             //to give alternate background fill  color to rows//
    }
    ob_end_flush();
    $pdf->Output('',"departmental_report.pdf",false);
?>    