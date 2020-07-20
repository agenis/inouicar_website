<?php
  /**
  * Requires the "PHP Email Form" library
  * The "PHP Email Form" library is available only in the pro version of the template
  * The library should be uploaded to: vendor/php-email-form/php-email-form.php
  * For more info and help: https://bootstrapmade.com/php-email-form/
  */

  // Replace contact@example.com with your real receiving email address
  $receiving_email_address = 'jeremy.paris17@gmail.com';

  if( file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php' )) {
    include( $php_email_form );
  } else {
    die( 'Unable to load the "PHP Email Form" Library!');
  }

  $contact = new PHP_Email_Form;
  $contact->ajax = true;
  
  $contact->to = $receiving_email_address;
  $contact->from_name = $_POST['firstName'];
  $contact->from_firstName = $_POST['firstName'];
  $contact->from_lastName = $_POST['lastName'];
  $contact->from_email = $_POST['email'];
  $contact->from_phoneNumber = $_POST['phoneNumber'];
  $contact->from_drivingLicence = $_POST['drivingLicence'];
  $contact->subject = $_POST['subject'];

   /*
  $contact->from_locationA = $_POST['locationA'];
  $contact->from_locationBack = $_POST['locationBack'];
  $contact->from_carModel = $_POST['carModel'];
  $contact->from_bookingDate = $_POST['bookingDate'];
  $contact->from_inputAddress = $_POST['inputAddress'];
  $contact->from_inputAddress2 = $_POST['inputAddress2'];
  $contact->from_inputCity = $_POST['inputCity'];
  $contact->from_inputState = $_POST['inputState'];
  $contact->from_inputZip = $_POST['inputZip'];
  $contact->from_Country = $_POST['Country'];
  $contact->from_returnDate = $_POST['returnDate'];
  $contact->from_returnPeriod = $_POST['returnPeriod'];
 */

  // Uncomment below code if you want to use SMTP to send emails. You need to enter your correct SMTP credentials
  /*
  $contact->smtp = array(
    'host' => 'example.com',
    'username' => 'example',
    'password' => 'pass',
    'port' => '587'
  );
  */

  $contact->add_message( $_POST['firstName'], 'From');
  $contact->add_message( $_POST['lastName'], 'From');
  $contact->add_message( $_POST['email'], 'Email');
  $contact->add_message( $_POST['drivingLicence'], 'Permis');
  
  $contact->add_message( $_POST['carModel'], 'Choix');
  $contact->add_message( $_POST['bookingDate'], 'Date de réservation');
  // $contact->add_message( $_POST['locationA'], 'Succursale de départ');
  $contact->add_message( $_POST['returnDate'], 'Date de retour du véhicule')
  // $contact->add_message( $_POST['locationBack'], 'Succursale de retour');;
  $contact->add_message( $_POST['returnPeriod'], 'Moment de la journée');

  $contact->add_message( $_POST['message'], 'Message', 10);

  echo $contact->send();
?>
