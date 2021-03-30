<?php

require('fpdf/fpdf.php');
require_once('connection.php');


$e_id = $_GET['id'];

$query1 = "SELECT * FROM event where event_id='$e_id'";
$result_set1 = mysqli_query($connection, $query1);
$record1 = mysqli_fetch_assoc($result_set1);
$event_name = $record1['event_name'];
$eo_id = $record1['eo_id'];
$total_amount = 0;

$query2 = "SELECT * FROM event_organizer where eo_id='$eo_id'";
$result_set2 = mysqli_query($connection, $query2);
$record2 = mysqli_fetch_assoc($result_set2);
$firstname = $record2['firstname'];
$lastname = $record2['lastname'];
$telno = $record2['telno'];
$email = $record2['email'];


$query = "SELECT * FROM public_ticket_price where event_id='$e_id'";
$result_set = mysqli_query($connection, $query);

if(isset($_POST['bt_pdf'])){
    
    $pdf = new FPDF('p', 'mm','a4');
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 13);
    $pdf->Cell(0, 10, 'Ticket Details', 0, 1, 'C' );
    $pdf->Cell(50, 10, 'Event name:  '.$event_name.' ', 0, 1, 'C' );
    $pdf->Cell(75, 10, 'Event organizer name:  '.$firstname.' '.$lastname.' ', 0, 1, 'C' );
    $pdf->Cell(65, 10, 'Event organizer tel no:  '.$telno.' ', 0, 1, 'C' );
    $pdf->Cell(60, 10, 'Event organizer email:  '.$email.' ', 0, 1, 'C' );
    $pdf->Cell(60, 10, ' ', 0, 1, 'C' );
    $pdf->Cell(40, 10, 'Ticket Price', 1, 0, 'C' );
    $pdf->Cell(40, 10, 'Quantity', 1, 0, 'C' );
    $pdf->Cell(40, 10, 'Issued Tickets', 1, 0, 'C' );
    $pdf->Cell(40, 10, 'Available Tickets', 1, 0, 'C' );
    $pdf->Cell(40, 10, 'Amount', 1, 1, 'C' );

   
    while ($record = mysqli_fetch_assoc($result_set)) {
        $amount = $record['ticket_price'] * $record['issue_tickets'];
        $total_amount = $total_amount + $amount;
        $available_tickets = $record['quantity'] - $record['issue_tickets'];
        $pdf->SetFont('Arial', 'I', 14);
        $pdf->Cell(40, 10, $record['ticket_price'], 1, 0, 'C' );
        $pdf->Cell(40, 10, $record['quantity'], 1, 0, 'C' );
        $pdf->Cell(40, 10, $record['issue_tickets'], 1, 0, 'C' );
        $pdf->Cell(40, 10, $available_tickets, 1, 0, 'C' );
        $pdf->Cell(40, 10, $amount, 1, 1, 'C' );

    }
    
    $total = 
    $pdf->SetFont('Arial', 'U', 14);
    $pdf->Cell(320, 10, 'Total amount:        '.$total_amount.' ', 0, 1, 'C' );

    $pdf->Output();
}


$pdf = new FPDF();
$pdf->AddPage();
// $pdf->SetFont('Arial', 'B', 16);
// $pdf->Cell(100, 20, 'Hello World', 1, 0, 'C' );
// $pdf->Output();




mysqli_close($connection);
