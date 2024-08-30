<?php
    //phpinfo();
    //$date = date('Y-m-d H:i:s');
    //echo $date;
    require('fpdf.php');
    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Times','',16);
    
    $pdf->Cell(0,10,'Fergusson College, Pune 04',0,1,'C');
    $pdf->Cell(0,10 ,'Department of Computer Science',0,1,'C');
    $pdf->Cell(0,2,'Bachelor of Computer Science',0,1,'C');
    $pdf->Cell(0,10,'Semester-I',0,1,'C');
    $pdf->Cell(0,10,'Subject Report',0,1,'C');
    //$pdf->Cell(0,0,'Artificial Intelligence',0,1,'C');
    $pdf->Cell(150);
    $pdf->Cell(30,15,'Date: '.date("d/m/Y"),0,1,'R');
    $pdf->SetFont('Times','',13);

    $pdf->Cell(100,5,'Faculty: Jane Miles',0,1,'L');
    $pdf->Cell(100,5,'Subject: Analysis of Algorithm and Computing',0,1,'L');
    $pdf->Cell(100,5,'Exam   : CE_I',0,1,'L');
    $pdf->Cell(0,10,'',0,1,'L');
    
    $pdf->SetFont('Times','B',14);
    $width_cell=array(20,50,20,30,60);
    $pdf->SetFillColor(193,229,252);

    // Header starts /// 
    $pdf->Cell($width_cell[0],10,'Roll No',1,0,'C',true);
    $pdf->Cell($width_cell[1],10,'NAME',1,0,'C',true);
    $pdf->Cell($width_cell[2],10,'Score',1,0,'C',true); 
    $pdf->Cell($width_cell[3],10,'DOB',1,0,'C',true);
    $pdf->Cell($width_cell[4],10,'Email',1,1,'C',true); 
    
    $connection =  mysqli_connect('localhost','anand','Happy@123','STMS',3306);
    if (!$connection) 
    {
        die("Connection failed: " . mysqli_connect_error());
    }
    $sql = "SELECT user_id,u_name,gender,dob,email from user";
    $result = mysqli_query($connection,$sql);
    
    $pdf->SetFont('Times','',12);
    $pdf->SetFillColor(235,236,236); 
    //to give alternate background fill color to rows// 
    $fill=false;
    
    while ($row = mysqli_fetch_assoc($result))
    {
        $pdf->Cell($width_cell[0],10,$row['user_id'],1,0,'C',$fill);
        $pdf->Cell($width_cell[1],10,$row['u_name'],1,0,'C',$fill);
        $pdf->Cell($width_cell[2],10,$row['gender'],1,0,'C',$fill);
        $pdf->Cell($width_cell[3],10,$row['dob'],1,0,'C',$fill);
        $pdf->Cell($width_cell[4],10,$row['email'],1,1,'C',$fill);
        //to give alternate background fill  color to rows//
        $fill = !$fill;
    }
    $pdf->Output('',"subject_report.pdf",false);
?>