<?php


$Name = $_POST['name'];
$Email = $_POST['email'];
$Subject = $_POST['subject'];
$MessageBox = $_POST['message'];
$Date = $_POST['date'];

if ($Email == " " || $Email == "") {
  echo "Error";
  header("Location: 404");
  die();
}

// Forwarding the data to the mail
// To
$to = "theoverseasmarketing@gmail.com";

// Subject
$subject = "New Contact Form Submission - Aadi Bhonsale";

// Message Template
$message = "

<!DOCTYPE html>
<html>

<head>
  <style>
    body {
      font-family: Arial, Helvetica, sans-serif;
    }

    .customers {
      font-family: Arial, Helvetica, sans-serif;
      border-collapse: collapse;
      width: 100%;
    }

    .customers td,
    .customers th {
      border: 1px solid #404040;
      padding: 8px;
    }

    .customers tr:nth-child(even) {
      background-color: #f2f2f2;
    }

    .customers tr:hover {
      background-color: #ddd;
    }

    .customers th {
      padding-top: 12px;
      padding-bottom: 12px;
      text-align: center;
      background-color: #404040;
      color: white;
    }
  </style>
</head>

<body>
  <h2>New Contact Form Entry</h2>
  <table class='customers'>
    <th>Field</th>
    <th>Data</th>
    <tr>
      <td>Name</td>
      <td>" . $Name . "</td>
    </tr>
    <tr>
      <td>Email</td>
      <td><a href='mailto:" . $Email . "'>" . $Email . "</a></td>
    </tr>
    <tr>
      <td>Subject</td>
      <td>" . $Subject . "</td>
    </tr>
    <tr>
      <td>Message</td>
      <td>" . $MessageBox . "</td>
    </tr>
    <tr>
      <td>Date</td>
      <td>" . $Date . "</td>
    </tr>
  </table>
</body>

</html>

";

$header = "From: noreply@aadibhonsale.github.io \r\n";

$header .= "MIME-Version: 1.0 \r\n";

$header .= "Content-type: text/html;charset=UTF-8 \r\n";

$result_mail = mail($to, $subject, $message, $header);

// if ($result_mail == true) {
//   echo "Message sent successfully!";
// } else {
//   echo "Sorry, unable to send mail!";
// }

// Ending Redirect
if ($result_db == true && $result_mail == true) {
  header("Location: index");
} else {
  echo "Error: " . mysqli_error($conn);
}