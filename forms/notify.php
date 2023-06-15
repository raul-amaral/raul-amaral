<?php
  /**
  * Requires the "PHP Email Form" library
  * The "PHP Email Form" library is available only in the pro version of the template
  * The library should be uploaded to: vendor/php-email-form/php-email-form.php
  * For more info and help: https://bootstrapmade.com/php-email-form/
  */

  // Replace contact@example.com with your real receiving email address
  $receiving_email_address = 'campoalor@dadus-suku.online';

  if( file_exists($php_email_form = '../assets/vendor/php-email-form/sendEmail.php' )) {
    include( $php_email_form );
  } else {
    die( 'Unable to load the "PHP Email Form" Library!');
  }

  $contact = new PHP_Email_Form;
  $contact->ajax = true;
  
  $contact->to = $receiving_email_address;
  $contact->from_name = $_POST['name'];
  $contact->from_email = $_POST['email'];
  $contact->subject ="Notify me request";

  // Uncomment below code if you want to use SMTP to send emails. You need to enter your correct SMTP credentials
  /*
  $contact->smtp = array(
    'host' => 'example.com',
    'username' => 'example',
    'password' => 'pass',
    'port' => '587'
  );
  */

  $contact->smtp = array(
    'host' => 'https://www.dadus-suku.online/',
    'username' => 'campoalor@dadus-suku.online',
    'password' => 'YEm905&dXz~q',
    'port' => '465'
  );


  $contact->add_message( $_POST['name'], 'Name');
  $contact->add_message( $_POST['subject'], 'Subject');
  $contact->add_message( $_POST['email'], 'Email');
  $contact->add_message( $_POST['body'], 'Body');

  echo $contact->send();
?>
