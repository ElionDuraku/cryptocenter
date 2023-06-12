<?php require_once("../../tcpdf/tcpdf.php"); ?>
<?php

$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      // Get form data
    $clientName = $_POST['client-name'];
    $email = $_POST['email'];
    $amount = $_POST['amount'] . " €";

    // Generate the invoice
    $pdf->SetCreator('Your Company');
    $pdf->SetAuthor('Your Company');
    $pdf->SetTitle('Invoice');
    $pdf->SetMargins(10, 10, 10);
    $pdf->AddPage();

    // Set the invoice header
    $pdf->SetFont('helvetica', 'B', 16);
    $pdf->Cell(0, 10, 'Invoice', 0, 1, 'C');
    $pdf->Ln(10);

    // Set additional header information
    $pdf->SetFont('helvetica', 'B', 12);
    $pdf->Cell(0, 10, 'CryptoCenter', 0, 1, 'C');
    $pdf->SetFont('helvetica', '', 10);
    $pdf->Cell(0, 10, '123 Main Street, City, Country', 0, 1, 'C');
    $pdf->Cell(0, 10, 'Phone: +123456789', 0, 1, 'C');
    $pdf->Ln(10);

    // Set the client information
    $pdf->SetFont('helvetica', 'B', 12);
    $pdf->Cell(30, 10, 'Client:', 0, 0);
    $pdf->SetFont('helvetica', '', 12);
    $pdf->Cell(0, 10, $clientName, 0, 1);

    // Calculate the table position
    $tableWidth = 160; // Adjust the width as needed
    $tableX = ($pdf->GetPageWidth() - $tableWidth) / 2;
    $tableY = $pdf->GetY() + 10; // Add a margin-top of 10

    // Create the invoice table
    $pdf->SetFont('helvetica', 'B', 12);
    $pdf->SetXY($tableX, $tableY);
    $pdf->Cell(10, 10, 'Nr', 1, 0, 'C');
    $pdf->Cell(70, 10, 'Email', 1, 0, 'C');
    $pdf->Cell(40, 10, 'Amount', 1, 0, 'C');
    $pdf->Cell(40, 10, 'Total', 1, 1, 'C');

    // Add the invoice data
    $pdf->SetFont('helvetica', '', 12);
    $pdf->SetX($tableX);
    $pdf->Cell(10, 10, '1', 1, 0, 'C');
    $pdf->Cell(70, 10, $email, 1, 0, 'C');
    $pdf->Cell(40, 10, $amount, 1, 0, 'C');
    $pdf->Cell(40, 10, $amount, 1, 1, 'C');

    // Calculate the total
    $total = $amount;

    // Add the total row
    $pdf->SetX($tableX);
    $pdf->SetFont('helvetica', 'B', 12);
    $pdf->Cell(80, 10, '', 0, 0); // Empty cell to align the total label
    $pdf->Cell(40, 10, 'Total', 1, 0, 'R');
    $pdf->Cell(40, 10, $total, 1, 1, 'C');
    $pdfContent = $pdf->Output('', 'S');

    $pdf->Output('invoice.pdf', 'I');
    // Prepare the email parameters
    $to = $email; // Recipient email address
    $subject = 'Invoice'; // Email subject
    $message = 'Please find the attached invoice.'; // Email message
    $from = 'sender@example.com'; // Sender email address
    $fileName = 'invoice.pdf'; // Name for the PDF attachment
    // Set the email headers
    $headers = "From: $from\r\n";
    $headers .= "Reply-To: $from\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: multipart/mixed; boundary=" . md5(time()) . "\r\n";
    // Generate a unique boundary
    $boundary = md5(time());
    // Build the email body
    $body = "--$boundary\r\n";
    $body .= "Content-Type: text/plain; charset=ISO-8859-1\r\n";
    $body .= "Content-Transfer-Encoding: 7bit\r\n";
    $body .= "\r\n";
    $body .= $message;
    $body .= "\r\n\r\n";
    $body .= "--$boundary\r\n";
    $body .= "Content-Type: application/pdf; name=\"$fileName\"\r\n";
    $body .= "Content-Disposition: attachment; filename=\"$fileName\"\r\n";
    $body .= "Content-Transfer-Encoding: base64\r\n";
    $body .= "\r\n";
    $body .= chunk_split(base64_encode($pdfContent));
    $body .= "\r\n";
    $body .= "--$boundary--";
    // Send the email
    if (mail($to, $subject, $body, $headers)) {
        echo "Email sent successfully with the PDF invoice attachment.";
    } else {
        echo "Failed to send email.";
    }
}

// if(isset($_GET["action"]) == "invoice"){
//   $pdf->Output('invoice.pdf', 'I');
// }
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Modernize Free</title>
  <link rel="shortcut icon" type="image/png" href="../assets/images/logos/favicon.png" />
  <link rel="stylesheet" href="../assets/css/styles.min.css" />
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <aside class="left-sidebar">
      <!-- Sidebar scroll-->
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8"></i>
          </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
          <ul id="sidebarnav">
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Home</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./dashboard.php" aria-expanded="false">
                <span>
                  <i class="ti ti-layout-dashboard"></i>
                </span>
                <span class="hide-menu">Dashboard</span>
              </a>
            </li>
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu"></span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./users.php" aria-expanded="false">
                <span>
                  <i class="ti ti-users"></i>
                </span>
                <span class="hide-menu">Users</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./add-founds.php" aria-expanded="false">
                <span>
                  <i class="ti ti-cards"></i>
                </span>
                <span class="hide-menu">Add Founds</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./invoice.php" aria-expanded="false">
                <span>
                  <i class="ti ti-file-description"></i>
                </span>
                <span class="hide-menu">Send Invoice</span>
              </a>
            </li>
          </ul>
        </nav>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">
      <!--  Header Start -->
      <header class="app-header">
        <nav class="navbar navbar-expand-lg navbar-light">
          <ul class="navbar-nav">
            <li class="nav-item d-block d-xl-none">
              <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                <i class="ti ti-menu-2"></i>
              </a>
            </li>
          </ul>
          <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
              <li class="nav-item dropdown">
                <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
                  aria-expanded="false">
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                  <div class="message-body">
                    <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-user fs-6"></i>
                      <p class="mb-0 fs-3">My Profile</p>
                    </a>
                    <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-mail fs-6"></i>
                      <p class="mb-0 fs-3">My Account</p>
                    </a>
                    <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-list-check fs-6"></i>
                      <p class="mb-0 fs-3">My Task</p>
                    </a>
                    <a href="./authentication-login.html" class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!--  Header End -->
      <div class="container-fluid">
        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title fw-semibold mb-4">Create Invoice</h5>
              <div class="card">
                <div class="card-body">
                  <form method="POST" class="form">
                    <div class="mb-3">
                      <label for="client-name" class="form-label">Client Name</label>
                      <input type="text" class="form-control" id="client-name" name="client-name">
                    </div>
                    <div class="mb-3">
                      <label for="email" class="form-label">Email</label>
                      <input type="email" class="form-control" name="email" id="email">
                    </div>
                    <div class="mb-3">
                      <label for="amount" class="form-label">Amount</label>
                      <input type="text" class="form-control" name="amount" id="amount">
                    </div>
                    <button type="submit" name="send-invoice" class="btn btn-primary">Send Invoice</button>
                    <a type="submit" href="?action=invoice" class="btn btn-primary">Preview Invoice</a>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/js/sidebarmenu.js"></script>
  <script src="../assets/js/app.min.js"></script>
  <script src="../assets/libs/simplebar/dist/simplebar.js"></script>

  <script>
    // document.querySelector(".form").addEventListener("submit", (e) => {
    //   e.preventDefault()
    // });
  </script>

</body>

</html>