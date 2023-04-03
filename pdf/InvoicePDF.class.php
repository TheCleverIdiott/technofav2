<?

class InvoicePDF extends FPDF {

	private $PG_W = 190;

	public function __construct($passInYourDataHere = NULL) {
		parent::__construct();		
		$this->LineItems();		
	}
	
	public function Header() {
		
		$this->SetFont('Arial', 'B', 16);
		$this->Cell($this->PG_W, 8, "Roxxor Ltd.", 0, 0, 'C');
		$this->Ln();
		
		$this->Cell($this->PG_W, 5, "INVOICE", 0, 0, 'L');
		$this->Ln(10);
		
		$this->SetFont('Arial', 'B', 12);
		
		$this->Cell($this->PG_W / 4, 5, "Invoice Number:", 0, 0, 'L');
		$this->Cell($this->PG_W / 4, 5, "ROXXOR_001", 0, 0, 'L');
		$this->Cell($this->PG_W / 4, 5, "To:", 0, 0, 'L');
		$this->Cell($this->PG_W / 4, 5, "The Client", 0, 0, 'L');		

		$this->Ln();
		
		$this->Cell($this->PG_W / 4, 5, "Invoice Date:", 0, 0, 'L');
		$this->Cell($this->PG_W / 4, 5, date("d/m/Y", time()), 0, 0, 'L');		
		$this->Cell($this->PG_W / 4, 5, "Address:", 0, 0, 'L');
		$this->MultiCell($this->PG_W / 4, 5, "1 Some Road\nSome Town\nPost Code", 0, 'L');		
		
		$this->Ln(10);
	}
		
	public function LineItems() {

		$header = array("Description", "Qty.", "Rate", "Sub.", "VAT", "Total");

		// Data
		
		$textWrap = str_repeat("this is a word wrap test ", 3);
		$textNoWrap = "there will be no wrapping here thank you";
		
		$data = array();
				
		$data[] = array($textWrap, 1, 50, 50, 0, 50);
		$data[] = array($textNoWrap, 1, 10500, 10500, 0, 10500);
				
		/* Layout */
		
		$this->SetDataFont();
		$this->AddPage();

		// Headers and widths
		
		$w = array(85, 25, 20, 20, 20, 20);

		for($i = 0; $i < count($header); $i++) {
			$this->Cell($w[$i], 7, $header[$i], 1, 0, 'C');
		}

		$this->Ln();

		// Mark start coords

		$x = $this->GetX();
		$y = $this->GetY();
		$i = 0;
		
		foreach($data as $row)
		{	
			$y1 = $this->GetY();
			$this->MultiCell($w[0], 6, $row[0], 'LRB');	
			$y2 = $this->GetY();
			$yH = $y2 - $y1;
						
			$this->SetXY($x + $w[0], $this->GetY() - $yH);
			
			$this->Cell($w[1], $yH, $row[1], 'LRB');
			$this->Cell($w[2], $yH, number_format($row[2], 2), 'LRB', 0, 'R');
			$this->Cell($w[3], $yH, number_format($row[3], 2), 'LRB', 0, 'R');
			$this->Cell($w[4], $yH, number_format($row[4], 2), 'LRB', 0, 'R');
			$this->Cell($w[5], $yH, number_format($row[5], 2), 'LRB', 0, 'R');
						
			$this->Ln();
			
			$i++;
		}
		
		$this->Ln(10);

		$this->setTextFont();
		$this->Cell($w[0] + $w[1] + $w[3], 6, 'Total', 'TB', 0, 'L');
		$this->setDataFont(true);
		$this->Cell($w[2], 6, number_format(2, 2), 'TB', 0, 'R');
		$this->Cell($w[2], 6, number_format(2, 2), 'TB', 0, 'R');
		$this->Cell($w[2], 6, number_format(2, 2), 'TB', 0, 'R');
		$this->Ln();

		$this->setTextFont();

		$this->Write(10, "Notes: " . "Thank you for your business.");
		$this->Ln(10);	
	}

	public function Footer() {

		$this->Ln();
		$this->Cell($this->PG_W, 5, "Payment Terms: " . "On Receipt", 0, 0, 'L');
		$this->Ln(10);
		$this->Cell($this->PG_W, 5, "Please make cheques payable to Roxxor Ltd.", 0, 0, 'L');
		$this->Ln(10);		
		$this->setTextFont(true);

		$this->Cell($this->PG_W, 5, "Payment Details:", 0, 0, 'L');
		$this->setTextFont(false);
		$this->Ln();
		$this->Cell($this->PG_W, 5, "Bank A/C No: 000000000", 0, 0, 'L');
		$this->Ln();
		
		// Footer address
		
		$address = "Roxxor Ltd.\nSomewhere in London\nUK";
		
		$this->SetY(-(($this->getAddressLength($address) * 5) + 20));

		$this->SetFont('Arial', '', 7);
		
		$this->Ln();
		$this->writeAddress($address);
	}

	private function setTextFont($isBold = false) {
		$this->SetFont('Arial', $isBold ? 'B' : '', 9);
	}
	
	private function setDataFont($isBold = false) {
		$this->SetFont('Courier', $isBold ? 'B' : '', 8);
	}

	private function getAddressLength($address) {
		return count(explode("\n", $address));
	}
		
	private function writeAddress($address) {
		$lines = explode("\n", $address);
		foreach ($lines as $line) {
			$this->Cell($this->PG_W, 5, $line, 0, 0, 'C');
			$this->Ln(4);
		}
	}	
}
?>