<?php
  // Create some random text-encoded data for a QR code.
  header('content-type: image/png');
  $url = 'https://chart.googleapis.com/chart?chid=' . md5(uniqid(rand(), true));
  $chd = 't:';
  for ($i = 0; $i < 150; ++$i) {
    $data = rand(0, 100000);
    $chd .= $data . ',';
  }
  $chd = substr($chd, 0, -1);

  // Add image type, image size, and data to params.
  $qrcode = array(
    'cht' => 'qr',
    'chs' => '300x300',
    'chl' => $chd);

  // Send the request, and print out the returned bytes.
  $context = stream_context_create(
    array('http' => array(
      'method' => 'POST',
      'content' => http_build_query($qrcode))));
  fpassthru(fopen($url, 'r', false, $context));
?>
